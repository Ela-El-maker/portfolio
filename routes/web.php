<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\BucketListController;
use App\Http\Controllers\Admin\BucketListSectionSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactSectionSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\FeedbackSectionSettingController;
use App\Http\Controllers\Admin\FooterHelpLinksController;
use App\Http\Controllers\Admin\FooterInfoContactController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\FooterUsefulLinksController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PersonalGrowthController;
use App\Http\Controllers\Admin\PersonalGrowthSectionSettingController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SEOSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceSectionSettingController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Admin\WorkingOnSectionSettingController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
});

Route::get('/portfolio-details', function () {
    return view('frontend.portfolio-details');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('portfolio-details/{id}', [HomeController::class, 'showPortfolio'])->name('show.portfolio');
// Route::get('portfolios', [HomeController::class, 'portfolio'])->name('portfolio');

Route::get('blog-details/{id}', [HomeController::class, 'showBlog'])->name('show.blog');

Route::get('blogs', [HomeController::class, 'blog'])->name('blog');

Route::post('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('resume/download', [AboutController::class, 'resumeDownload'])->name('resume.download');


/***Admin Routes */
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);

    /***Service Route* */
    Route::resource('service', ServiceController::class);
    /**** Service Section Setting Route */
    Route::resource('service-section-setting', ServiceSectionSettingController::class);

    /**** Working on Section Setting Route */
    Route::resource('working-on-section-setting', WorkingOnSectionSettingController::class);

    /**** BucketList Section Setting Route */
    Route::resource('bucket-list-section-setting', BucketListSectionSettingController::class);

    /***CareerGrowth Route* */
    Route::resource('bucket-list', BucketListController::class);


    /***PersonalGrowth Route* */
    Route::resource('personal-growth', PersonalGrowthController::class);

    /**** Growth Section Setting Route */
    Route::resource('personal-growth-section-setting', PersonalGrowthSectionSettingController::class);


    /***About Route* */
    Route::resource('about', AboutController::class);


    /*** Category Route */
    Route::resource('category', CategoryController::class);


    /**** Portfolio Item Route */
    Route::resource('portfolio-item', PortfolioItemController::class);


    /**** Portfolio Section Setting Route */
    Route::resource('portfolio-section-setting', PortfolioSectionSettingController::class);

    /**** Skill Section Setting Route */
    Route::resource('skill-section-setting', SkillSectionSettingController::class);

    /**** Skill Item Setting Route */
    Route::resource('skill-item', SkillItemController::class);

    /** experience Section */
    Route::resource('experience', ExperienceController::class);

    Route::resource('feedback', FeedbackController::class);
    Route::resource('feedback-section-setting', FeedbackSectionSettingController::class);

    /*** Blog Category Route */
    Route::resource('blog-category', BlogCategoryController::class);
    Route::resource('blog-section-setting', BlogSectionSettingController::class);

    Route::resource('blog', BlogController::class);


    Route::resource('contact-section-setting', ContactSectionSettingController::class);

    Route::resource('footer-social-link', FooterSocialLinkController::class);
    Route::resource('footer-info', FooterInfoController::class);
    Route::resource('footer-info-contact', FooterInfoContactController::class);
    Route::resource('footer-useful-links', FooterUsefulLinksController::class);
    Route::resource('footer-help-links', FooterHelpLinksController::class);


    /*** Settings */
    Route::get('settings', SettingController::class)->name('settings.index');

    Route::resource('general-setting', GeneralSettingController::class);

    Route::resource('seo-setting', SEOSettingController::class);
});

/*** */
