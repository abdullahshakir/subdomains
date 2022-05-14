<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function views()
    {
        return $this->hasMany(Views::class, 'domain_id');
    }

    public function aboutUs()
    {
        return $this->hasMany(AboutUs::class, 'theme_id');
    }
    public function contactUs()
    {
        return $this->hasMany(ContactUs::class, 'theme_id');
    }
    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'theme_id');
    }
    public function portfolio()
    {
        return $this->hasMany(Portfolio::class, 'theme_id');
    }
    public function service()
    {
        return $this->hasMany(Service::class, 'theme_id');
    }

    public static function create($data, $request)
    {
        try {
            if ($request->email) {
                $data->theme_id = $request->themeId;
                $data->name = $request->name;
                $data->email = $request->email;
                $data->phone = $request->phone;
                $data->message = $request->message;
                $data->service = $request->service;
                $data->subject = $request->subject;
                $data->is_theme_contact_mail = $request->is_theme_contact_mail;
                $data->save();
            }
            if($request->file()) {
                $name = time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');
                $data->file = '/storage/' . $filePath;
                $data->theme_id = $request->themeId;
                $data->title = $request->title;
                $data->sub_title = $request->subTitle;
                $data->section = $request->section;
                $data->description = $request->description;
                $data->save();
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function viewtheme()
    {
        return $this->hasOne(Views::class, 'domain_id');
    }

}
