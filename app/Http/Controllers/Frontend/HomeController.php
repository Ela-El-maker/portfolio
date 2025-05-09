<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogSectionSetting;
use App\Models\BucketList;
use App\Models\BucketListSectionSetting;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\ContactSectionSetting;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbacksectionSetting;
use App\Models\Hero;
use App\Models\PersonalGrowth;
use App\Models\PersonalGrowthSectionSetting;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use App\Models\Service;
use App\Models\ServiceSectionSetting;
use App\Models\SkillItem;
use App\Models\SkillSectionSetting;
use App\Models\TyperTitle;
use App\Models\WorkingOn;
use App\Models\WorkingOnSectionSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //
    public function index()
    {
        $hero = Hero::first();
        $typerTitles = TyperTitle::where('show', 1)->get();
        $services = Service::where(['show' => 1])->get();
        $personalGrowth = PersonalGrowth::where(['status' => 'published', 'show' => 1])->latest()->take(3)->get();
        $bucketListGrowth = BucketList::where(['status' => 'published', 'show' => 1])->latest()->take(3)->get();
        $workingsGrowth = WorkingOn::where(['status' => 'published', 'show' => 1])->latest()->take(3)->get();
        $about = About::first();
        $portfolioTitle = PortfolioSectionSetting::first();
        $personalTitle = PersonalGrowthSectionSetting::first();
        $serviceTitle = ServiceSectionSetting::first();
        $workingOnTitle = WorkingOnSectionSetting::first();
        $bucketlistTitle = BucketListSectionSetting::first();
        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::where(['status' => 'published', 'show' => 1])->latest()->take(3)->get();
        $skillSection = SkillSectionSetting::first();
        $skillProgram = SkillItem::all();
        $experience = Experience::first();
        $feedbacks = ContactMessage::where(['show' => 1])->latest()->get();
        $feedbackSection = FeedbacksectionSetting::first();
        $blogs = Blog::where(['status' => 'published', 'show' => 1])->latest()->take(4)->get();
        $blogTitle = BlogSectionSetting::first();
        $contactTitle = ContactSectionSetting::first();

        return view(
            'frontend.home',
            compact(
                'hero',
                'typerTitles',
                'services',
                'personalGrowth',
                'about',
                'portfolioTitle',
                'portfolioCategories',
                'portfolioItems',
                'personalTitle',
                'serviceTitle',
                'workingOnTitle',
                'workingsGrowth',
                'bucketlistTitle',
                'bucketListGrowth',
                'skillSection',
                'skillProgram',
                'experience',
                'feedbacks',
                'feedbackSection',
                'blogs',
                'blogTitle',
                'contactTitle',
            )
        );
    }

    public function showPortfolio($id)
    {
        $portfolio = PortfolioItem::where('id', $id)
            ->where('status', 'published') // or 'visible' depending on your model
            ->firstOrFail();

        return view('frontend.portfolio-details', compact('portfolio'));
    }


    public function showBlog($id)
    {
        // Get the main blog post, ensure it's published and visible
        $blog = Blog::where('id', $id)
            ->where('status', 'published')
            ->where('show', 1)
            ->firstOrFail();

        // Get the previous post
        $previousPost = Blog::where('status', 'published')
            ->where('show', 1)
            ->where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first();

        // Get the next post
        $nextPost = Blog::where('status', 'published')
            ->where('show', 1)
            ->where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('frontend.blog-details', compact('blog', 'previousPost', 'nextPost'));
    }



    // public function  portfolio()
    // {
    //     $portfolioCategories = Category::all();
    //     $portfolioTitle = PortfolioSectionSetting::first();
    //     $portfolioItems = PortfolioItem::all();
    //     $portfolios = PortfolioItem::latest()->paginate(6);
    //     return view('frontend.sections.portfolio', compact('portfolios','portfolioTitle','portfolioCategories','portfolioItems'));
    // }

    public function  blog()
    {
        $blogs = Blog::where(['status' => 'published', 'show' => 1])->latest()->paginate(6);
        return view('frontend.blog', compact('blogs'));
    }

    // public function contact(Request $request){
    //     // dd($request->all());
    //     $request->validate([
    //         'name' => ['required', 'max:200'],
    //         'subject' => ['required', 'max:300'],
    //         'email' => ['required', 'email'],
    //         'message' => ['required', 'max:2000'],

    //     ]);

    //     Mail::send(new ContactMail($request->all()));

    //     return response(['status' => 'success', 'message' => 'Mail Sent Successfully!']);
    // }
}
