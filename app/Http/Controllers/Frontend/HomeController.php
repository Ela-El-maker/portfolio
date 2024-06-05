<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbacksectionSetting;
use App\Models\Hero;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use App\Models\Service;
use App\Models\SkillItem;
use App\Models\SkillSectionSetting;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        $about = About::first();
        $portfolioTitle = PortfolioSectionSetting::first();
        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::all();
        $skillSection = SkillSectionSetting::first();
        $skillProgram= SkillItem::all();
        $experience = Experience::first();
        $feedbacks = Feedback::all();
        $feedbackSection = FeedbacksectionSetting::first();
        $blogs = Blog::latest()->take(4)->get();
        return view(
            'frontend.home',
            compact(
                'hero',
                'typerTitles',
                'services',
                'about',
                'portfolioTitle',
                'portfolioCategories',
                'portfolioItems',
                'skillSection',
                'skillProgram',
                'experience',
                'feedbacks',
                'feedbackSection',
                'blogs'
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
}
