<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use App\Models\Admin;
use App\Models\Reviews;
use App\Models\Services;
use App\Models\VisaTypes;
use App\Models\Advantages;
use App\Services\HomeService;
use App\Models\VisaCategories;
use App\Http\Requests\Form\PostRequest;
use App\Models\MetaTags;
use App\Models\UserApplication;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserApplicationNotification;

class HomeController extends Controller
{
	private $route = 'home-page';

	public function index()
	{
		$advantages = Advantages::withTranslation()->translatedIn(app()->getLocale())->get();

		$visa_categories = VisaCategories::withTranslation()->translatedIn(app()->getLocale())->get()->groupBy('country');

		$services = Services::withTranslation()->translatedIn(app()->getLocale())->get()->toArray();

		$reviews = Reviews::orderBy('image_order', 'ASC')->get();

		$visas_img = Visa::orderBy('image_order', 'ASC')->get();

		$visa_types = VisaTypes::withTranslation()->translatedIn(app()->getLocale())->get();

		$meta = MetaTags::withTranslation()->translatedIn(app()->getLocale())->where('route', $this->route)->first();

		return view('home', compact('advantages', 'visa_categories', 'services', 'reviews', 'visas_img', 'visa_types', 'meta'));
	}

	public function getForm(PostRequest $request, HomeService $homeService)
	{
		$user_application = $request->all();

		$logging = $homeService->postLogging($user_application);

		$is_spam = $homeService->isSpam($user_application);

		if ($is_spam) {
			return redirect()->route('home');
		}

		$application_data = UserApplication::create($homeService->createApplication($user_application));

		$admins = Admin::all();

		Notification::send($admins, new UserApplicationNotification($application_data));

		return redirect()->route('home-locale', app()->getLocale())->with('success', __('home.form.application_succes'));
	}
}