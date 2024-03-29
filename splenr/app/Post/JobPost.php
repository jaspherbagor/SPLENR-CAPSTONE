<?php

namespace App\Post;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class JobPost
{

    protected $listing;
    public function __construct(Listing $listing)
    {
        $this->listing = $listing;
    }

    public function getImagePath(Request $data)
    {
        return $data->file('feature_image')->store('images', 'public');
    }

    public function store(Request $data): void
    {
        $imagePath = $this->getImagePath($data);
        $this->listing->feature_image = $imagePath;
        $this->listing->user_id = auth()->user()->id;
        $this->listing->title = $data['title'];
        $this->listing->description = $data['description'];
        $this->listing->roles = $data['roles'];
        $this->listing->requirements = $data['requirements'];
        $this->listing->job_type = $data['job_type'];
        $this->listing->address = $data['address'];

        // Attempt to create a Carbon instance from the provided date string
        try {
            $parsedDate = Carbon::createFromFormat('m/d/Y', $data['date']);
            $formattedDate = $parsedDate->format('Y-m-d');
            $this->listing->application_close_date = $formattedDate;
        } catch (\Exception $e) {
            dd($e->getMessage()); // Debugging: Dump the exception message
        }

        $this->listing->salary = $data['salary'];
        $this->listing->slug = Str::slug($data['title']) . '.' . Str::uuid();
        $this->listing->save();
    }


    public function updatePost(int $id, Request $data): void
    {
        if ($data->hasFile('feature_image')) {
            $this->listing->find($id)->update(['feature_image' => $this->getImagePath($data)]);
        }

        $this->listing->find($id)->update($data->except('feature_image'));
    }
}
