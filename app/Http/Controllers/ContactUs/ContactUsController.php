<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsValidatorRequest;
use App\Http\Requests\CustomValidatorRequest;
use App\Models\ContactUs;
use App\Models\Theme;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public static function createContactUs(ContactUsValidatorRequest $request)
    {
        try {
            $create = new ContactUs;
            Theme::create($create, $request);
            return response()->json(['message' => 'created'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function view(Request $request)
    {
        try {
            return view('backoffice.contact.view', with(['data' => ContactUs::all()]));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            return response()->json(['data' => ContactUs::where('id', $id)->first()], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function update(CustomValidatorRequest $request, $id)
    {
        try {

            return response()->json(['data' => ContactUs::paginate(12)], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $about = ContactUs::findOrFail($id);
            $about->delete();
            return response()->json(['message' => 'Deleted successfully'], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}
