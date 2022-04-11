<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeWebsiteRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use App\Providers\PostPublished;
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
            'statusCode' => 201,
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
            'statusCode' => 201,
            'text' => 'Website created successfully'
        ];

        return json_encode($data);
    }

    // subscribe a  website
    public function subscribe(SubscribeWebsiteRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->websites()->sync(['website_id' => $request->website_id]);

        $data = [
            'error' => [],
            'statusCode' => 200,
            'text' => 'Website subscribed successfully',
        ];

        return json_encode($data);
    }

    public function publishPost(Post $post)
    {
        $post->published_at = now();
        $post->save();

        event(new PostPublished($post));

        $data = [
            'error' => [],
            'statusCode' => 200,
            'text' => 'Post Published',
        ];

        return json_encode($data); 
    }
}
