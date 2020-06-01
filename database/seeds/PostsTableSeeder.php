<?php


use App\Category;
use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'News',
        ]);
        $author1 = App\User::create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $author2 = App\User::create([
            'name' => 'Jane Doe',
            'email' => 'Janen@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $category2 = Category::create([
            'name' => 'Marketing',
        ]);
        $category3 = Category::create([
            'name' => 'Partnership',
        ]);
        
        $post1 = Post::create([
            'title'=> 'We relocated our office to a new designed garage',
            'description' => 'here we go',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English.',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
            // 'video' => 'posts/1.mp4',
            'user_id' => $author1->id,
            ]);
        $post2 = Post::create([
            'title'=> 'Top 5 brilliant content marketing strategies',
            'description' => 'here we go',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English.',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg',
            // 'video' => 'posts/1.mp4',
            'user_id' => $author2->id,

        ]);
        $post3 = Post::create([
            'title'=> 'Best practices for minimalist design with example',
            'description' => 'here we go',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English.',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg',
            // 'video' => 'posts/1.mp4',
            'user_id' => $author2->id,

        ]);
        $post4 = Post::create([
            'title'=> 'Congratulate and thank to Maryam for joining our team',
            'description' => 'here we go',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English.',
            'category_id' => $category2->id,
            'image' => 'posts/4.jpg',
            // 'video' => 'posts/1.mp4',
            'user_id' => $author1->id,

        ]);
        // $tag1 = Tag::create([
        //     'name' => 'Job',
        // ]);
        // $tag2 = Tag::create([
        //     'name' => 'Customers',
        // ]);
        // $tag3 = Tag::create([
        //     'name' => 'Records',
        // ]);
        // $post1->tags()->attach([$tag1->id,$tag2->id]);
        // $post2->tags()->attach([$tag2->id,$tag3->id]);
        // $post3->tags()->attach([$tag1->id,$tag3->id]);
        // $post4->tags()->attach([$tag2->id]);

    }
}
