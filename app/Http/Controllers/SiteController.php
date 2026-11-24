<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Service;
use App\Models\ProjectCategory;
use App\Models\Insight;
use App\Models\InsightCategory;
use App\Models\MaterialNFinish;
use App\Models\RoiRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\StoreRoiRequestRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function index(): View
    {
        return view('front.home')->with('page',Page::with('pageMetas','pageFiles')->where('id',10)->first());
    }
    public function partners() : View
    {
        return view('front.partners')->with('page',Page::with('pageMetas','pageFiles')->where('id',12)->first());
    }

    public function portfolios(Request $request): View
    {
        $categorySlug = $request->query('category');
        $projectCategories = ProjectCategory::orderBy('title')->get();

        $projects = Project::with(['category', 'feature_img'])
            ->when($categorySlug, function ($query) use ($projectCategories, $categorySlug) {
                $matchedCategory = $projectCategories->first(function ($category) use ($categorySlug) {
                    return Str::slug($category->title) === $categorySlug;
                });

                if ($matchedCategory) {
                    $query->where('project_category_id', $matchedCategory->id);
                }
            })
            ->paginate(9)
            ->withQueryString();

        return view('front.portfolios', compact('projects', 'projectCategories', 'categorySlug'))->with('page',Page::with('pageMetas','pageFiles')->where('id',4)->first());
    }
    public function contact(): View
    {
        return view('front.contact')->with('page',Page::with('pageMetas','pageFiles')->where('id',1)->first());
    }
    public function about(): View
    {
        return view('front.about')->with('page',Page::with('pageMetas','pageFiles')->where('id',2)->first());
    }
    public function services(): View
    {
        return view('front.services')->with('services',Service::orderBy('id','ASC')->paginate(6))->with('page',Page::with('pageMetas','pageFiles')->where('id',3)->first());
    }
    public function serviceDetails($slug): View
    {
        $relatedProjects = Project::with(['feature_img'])
            ->limit(3)
            ->get();
        $service = Service::where('slug',$slug)->with(['sections.items'])->first();
        return view('front.service-single',compact('service','relatedProjects'));
    }
    public function portfolioDetails($slug): View
    {
        $project = Project::where('slug', $slug)
            ->with(['category', 'feature_img', 'gallery'])
            ->firstOrFail();

        $relatedProjects = Project::where('project_category_id', $project->project_category_id)
            ->where('id', '!=', $project->id)
            ->with(['feature_img'])
            ->limit(3)
            ->get();

        return view('front.portfolio-single', compact('project', 'relatedProjects'));
    }
    public function workshop(): View
    {
        return view('front.workshop')->with('page',Page::with('pageMetas','pageFiles')->where('id',4)->first());
    }
    public function sustainability(): View
    {
        $page = Page::with('pageMetas','pageFiles')->find(7);
        $projects = Project::with('feature_img')->latest()->limit(3)->get();

        return view('front.sustainability', compact('page', 'projects'));
    }
    public function roiCalculator(): View
    {
        return view('front.roi-calculator')->with('page',Page::with('pageMetas','pageFiles')->where('id',8)->first());
    }
    public function insights(Request $request): View
    {
        $categorySlug = $request->query('category');
        $insightCategories = InsightCategory::orderBy('title')->get();
        $categoryId = null;

        $insights = Insight::with(['featureImage', 'category'])
            ->when($categorySlug, function ($query) use ($insightCategories, $categorySlug) {
                $matchedCategory = $insightCategories->first(function ($category) use ($categorySlug) {
                    return Str::slug($category->title) === $categorySlug;
                });

                if ($matchedCategory) {
                    $query->where('insight_category_id', $matchedCategory->id);
                }
            })
            ->where('status', 'published')
            ->orderBy('publish_date', 'DESC')
            ->paginate(6)
            ->withQueryString();

        // Set categoryId for view active tab logic
        if ($categorySlug) {
            $matchedCategory = $insightCategories->first(function ($category) use ($categorySlug) {
                return Str::slug($category->title) === $categorySlug;
            });
            $categoryId = $matchedCategory?->id;
        }

        $page = Page::with('pageMetas','pageFiles')->where('id',9)->first();

        return view('front.insights', compact('insights', 'insightCategories', 'categoryId', 'page'));
    }
    public function insightDetails($slug): View
    {
        $insight = Insight::where('slug', $slug)
            ->with(['featureImage', 'gallery', 'category'])
            ->where('status', 'published')
            ->firstOrFail();

        $relatedInsights = Insight::where('insight_category_id', $insight->insight_category_id)
            ->where('id', '!=', $insight->id)
            ->with(['featureImage'])
            ->limit(3)
            ->get();

        return view('front.insight-single', compact('insight', 'relatedInsights'));
    }
    public function showroom(): View
    {
        return view('front.showroom')->with('materials',MaterialNFinish::with('feature_img','gallery')->get())->with('page',Page::with('pageMetas','pageFiles')->where('id',9)->first());
    }

    public function storeRoiRequest(StoreRoiRequestRequest $request): RedirectResponse
    {
        $data = $request->validated();
        RoiRequest::create($data);
        
        try {
            Mail::send('emails.roi-calculator-form', $data, function ($message) use ($data) {
                $message->from(
                    config('mail.from.address'),
                    config('mail.from.name')
                );
    
                $message->to('info@spatialpropertygroup.com');
                $message->replyTo($data['email'], $data['full_name']);
                $message->subject('New ROI Calculator Submission - Spatial Property Group');
            });
    
        } catch (\Exception $e) {
            
            return back()
                ->withInput()
                ->with('error', 'Mail error: ' . $e->getMessage());
        }

        return redirect(route('roi-calculator'))->with('success', 'Thank you for submitting your ROI calculation request! We will review your information and get back to you soon.');
    }
    public function storeContact(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Contact::create($data);
        
        try {
            Mail::send('emails.contact-form', $data, function ($message) use ($data) {
                $message->from(
                    config('mail.from.address'),
                    config('mail.from.name')
                );

                $message->to('info@spatialpropertygroup.com');
                $message->replyTo($data['email'], $data['first_name'] . ' ' . $data['last_name']);
                $message->subject('New Contact Form Submission - Spatial Property Group');
            });


        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Mail error: ' . $e->getMessage());
        }

        return redirect(route('contact'))->with('contact_success', 'Thank you! Your request has been submitted successfully.');
    }
    public function comming_soon()
    {
        return view('front.comming_soon');
    }
}
