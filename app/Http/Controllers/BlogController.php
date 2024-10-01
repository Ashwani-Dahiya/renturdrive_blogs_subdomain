<?php

namespace App\Http\Controllers;

use App\Models\BlogAuthorModel;
use App\Models\BlogCategroyModel;
use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller
{
    public function blog_page()
    {
        $blogs = BlogModel::where('status', 1)->with('blog_category')->with('blog_author')->get();
        return view('blog', compact('blogs'));
    }
    public function blog_details($url)
    {
        $blog = BlogModel::where('blog_url', $url)
            ->with('blog_category')
            ->first();
        return view('blog_details', compact('blog'));
    }
    public function all_blog_page()
    {
        $blogs = BlogModel::with('blog_category')->with('blog_author')->get();
        return view('admin.blog', compact('blogs'));
    }
    public function add_blog_page()
    {
        $blogsCates = BlogCategroyModel::all();
        $blogAuthers = BlogAuthorModel::all();
        return view('admin.add_blog', compact('blogsCates', 'blogAuthers'));
    }
    public function add_blog_submit(Request $request)
    {
        // Validate all required fields and check for category selection
        $request->validate([
            'blog_category' => 'required|not_in:0', // Ensure category is not 0
            'blog_author' => 'required|not_in:0', // Ensure category is not 0
            'blog_title' => 'required|string',
            'image_alt' => 'required|string',
            'short_description' => 'required',
            'seo_title' => 'required|string',
            'seo_description' => 'required',
            'blog_url' => 'required',
            'long_description' => 'required',
            'photo' => 'required|mimes:jpeg,jpg,png,webp|max:2048' // Validate image formats
        ], [
            'blog_category.not_in' => 'Please select a blog category', // Custom error message
            'blog_author.not_in' => 'Please select an author' // Custom error message
        ]);

        // Handle the image upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

            // Store the image in 'public/uploads/blog-images/' directory
            $image->move(public_path('uploads/blog-images'), $imageName);

            // Full URL of the image
            $imageUrl = url('uploads/blog-images/' . $imageName);
        }

        // Base64 encode the long description
        $longDescriptionBase64 = base64_encode($request->input('long_description'));

        // Create and save the new blog
        $blog = new Blogmodel();
        $blog->category_id = $request->input('blog_category');
        $blog->author_id = $request->input('blog_author');
        $blog->title = $request->input('blog_title');
        $blog->image_alt = $request->input('image_alt');
        $blog->short_description = $request->input('short_description');
        $blog->seo_title = $request->input('seo_title');
        $blog->seo_description = $request->input('seo_description');
        $blog->blog_url = $request->input('blog_url');
        $blog->long_description = $longDescriptionBase64; // Save encoded long description
        $blog->image = $imageUrl; // Save the image URL

        $blog->save(); // Save the blog to the database

        // Redirect with success message
        return redirect()->back()->with('success', 'Blog added successfully!');
    }
    public function update_blog_page($id)
    {
        $blog = BlogModel::with('blog_category')->with('blog_author')->find($id);
        $blogsCates = BlogCategroyModel::all();
        $blogAuthers = BlogAuthorModel::all();
        return view('admin.update_blog', compact('blog', 'blogsCates', 'blogAuthers'));
    }

    public function update_blog(Request $request, $id)
    {
        // Validate all required fields and check for category and author selection
        $request->validate([
            'blog_category' => 'required|not_in:0', // Ensure category is not 0
            'blog_author' => 'required|not_in:0', // Ensure author is not 0
            'blog_title' => 'required|string',
            'image_alt' => 'required|string',
            'short_description' => 'required',
            'seo_title' => 'required|string',
            'seo_description' => 'required',
            'blog_url' => 'required',
            'long_description' => 'required',
            'photo' => 'nullable|mimes:jpeg,jpg,png,webp|max:2048' // Image upload is optional
        ], [
            'blog_category.not_in' => 'Please select a blog category', // Custom error message
            'blog_author.not_in' => 'Please select an author' // Custom error message
        ]);

        // Find the existing blog by ID
        $blog = Blogmodel::findOrFail($id);

        // Handle the image upload if a new image is provided
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();

            // Store the image in 'public/uploads/blog-images/' directory
            $image->move(public_path('uploads/blog-images'), $imageName);

            // Full URL of the image
            $imageUrl = url('uploads/blog-images/' . $imageName);

            // Update blog image URL
            $blog->image = $imageUrl;
        }

        // Base64 encode the long description
        $longDescriptionBase64 = base64_encode($request->input('long_description'));

        // Update the blog details
        $blog->category_id = $request->input('blog_category');
        $blog->author_id = $request->input('blog_author');
        $blog->title = $request->input('blog_title');
        $blog->image_alt = $request->input('image_alt');
        $blog->short_description = $request->input('short_description');
        $blog->seo_title = $request->input('seo_title');
        $blog->seo_description = $request->input('seo_description');
        $blog->blog_url = $request->input('blog_url');
        $blog->long_description = $longDescriptionBase64; // Save encoded long description

        // Save the updated blog to the database
        $blog->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Blog updated successfully!');
    }

    public function delete_blog($id)
    {
        $blog = BlogModel::find($id);
        if ($blog) {
            $blog->delete();
            return redirect()->back()->with('success', 'Blog deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Blog not found!');
        }
    }


    public function add_blog_category()
    {
        $blogCates = BlogCategroyModel::all();
        return view('admin.add_blog_category', compact('blogCates'));
    }
    public function add_blog_category_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $blogCategory = new BlogCategroyModel();
        $blogCategory->name = $request->input('name');
        $blogCategory->save();
        return redirect()->back()->with('success', 'Blog category added successfully!');
    }
    public function add_blog_author()
    {
        $blogAuthers = BlogAuthorModel::all();
        return view('admin.add_blog_author', compact('blogAuthers'));
    }
    public function add_blog_author_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);


        $blogAuthor = new BlogAuthorModel();
        $blogAuthor->name = $request->input('name');

        $blogAuthor->save();

        return redirect()->back()->with('success', 'Blog author added successfully!');
    }
    public function delete_blog_author($id)
    {
        $blogAuthor = BlogAuthorModel::find($id);
        if ($blogAuthor) {
            $blogAuthor->delete();
            return redirect()->back()->with('success', 'Blog author deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Blog author not found!');
        }
    }
    public function delete_blog_category($id)
    {
        $blogCategory = BlogCategroyModel::find($id);
        if ($blogCategory) {
            $blogCategory->delete();
            return redirect()->back()->with('success', 'Blog category deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Blog category not found!');
        }
    }
}
