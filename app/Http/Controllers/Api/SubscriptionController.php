<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    // store post
    // TODO:: add validation
    public function storePost(Request $request)
    {
        Post::Create(
            [
                'user_id' => $request->user_id,
                'name' => $request->name,
                'description' => $request->description,
                'website_id' => $request->website_id,
            ]
        );

        // TODO:: fire an post created event and handle sending email notification to the user

        $data = [
            'error' => [],
            'text' => 'Post created successfully'
        ];

        return json_encode($data);
    }

    // store website
    // TODO:: add validation
    public function storeWebsite(Request $request)
    {
        Website::Create(
            [
                'name' => $request->name,
                'site_url' => $request->site_url,
            ]
        );

        $data = [
            'error' => [],
            'text' => 'Website created successfully'
        ];

        return json_encode($data);
    }   
}
