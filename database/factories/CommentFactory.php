<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\User;
// use Database\Factories\UserFactory;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Comment::class;

    public function definition()
    {
        return [
            //
            'user_id' => User::factory(),
            'post_id' => Post::factory(),
            'comment_text' => fake()->text(),
            'comment_date'=>now(),
        ];
    }
}
