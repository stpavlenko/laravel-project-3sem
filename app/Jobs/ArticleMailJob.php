<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ArticleMail;
use App\Models\Article;
use Illuminate\Support\Facades\Mail;


class ArticleMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     protected $article;
    public function __construct(Article $article)
    {
        $this->article=$article;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('steponchick@gmail.com')->send(new ArticleMail($this->article));
    }
}
