<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use Psr\Http\Message\UriInterface;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        SitemapGenerator::create(config('app.url'))
            // Prevent crawling of admin, auth, and verification URLs
            ->shouldCrawl(function (UriInterface $url) {
                $path = $url->getPath();

                return !(
                    str_starts_with($path, '/admin') ||
                    str_starts_with($path, '/login') ||
                    str_starts_with($path, '/register') ||
                    str_starts_with($path, '/confirm-password') ||
                    str_starts_with($path, '/verify-email')
                );
            })

            // Extra safety: Don't include them in sitemap if crawled anyway
            ->hasCrawled(function (Url $url) {
                $path = $url->path();

                if (
                    str_starts_with($path, 'admin') ||
                    str_starts_with($path, 'login') ||
                    str_starts_with($path, 'register') ||
                    str_starts_with($path, 'confirm-password') ||
                    str_starts_with($path, 'verify-email')
                ) {
                    return null; // Skip this URL
                }

                return $url; // Keep
            })

            ->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully.');
    }
}
