<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogSectionSetting;
use App\Models\Category;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //
    public function index()
    {
        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        $personalGrowth = PersonalGrowth::all();
        $about = About::first();
        $portfolioTitle = PortfolioSectionSetting::first();
        $personalTitle = PersonalGrowthSectionSetting::first();
        $serviceTitle = ServiceSectionSetting::first();

        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::all();
        $skillSection = SkillSectionSetting::first();
        $skillProgram= SkillItem::all();
        $experience = Experience::first();
        $feedbacks = Feedback::all();
        $feedbackSection = FeedbacksectionSetting::first();
        $blogs = Blog::latest()->take(4)->get();
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
                'skillSection',
                'skillProgram',
                'experience',
                'feedbacks',
                'feedbackSection',
                'blogs',
                'blogTitle',
                'contactTitle'
            )
        );
    }

    public function showPortfolio($id)
    {
        $portfolio = PortfolioItem::findorfail($id);
        return view('frontend.portfolio-details', compact('portfolio'));
    }

    public function showBlog($id)
    {
        $blog = Blog::findorfail($id);
        $previousPost = Blog::where('id','<',$blog->id)->orderBy('id','desc')->first();
        $nextPost = Blog::where('id','>',$blog->id)->orderBy('id','asc')->first();

        return view('frontend.blog-details', compact('blog','previousPost','nextPost'));
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
        $blogs = Blog::latest()->paginate(6);
        return view('frontend.blog', compact('blogs'));
    }

    public function contact(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'max:200'],
            'subject' => ['required', 'max:300'],
            'email' => ['required', 'email'],
            'message' => ['required', 'max:2000'],

        ]);

        Mail::send(new ContactMail($request->all()));

        return response(['status' => 'success', 'message' => 'Mail Sent Successfully!']);
    }
}
