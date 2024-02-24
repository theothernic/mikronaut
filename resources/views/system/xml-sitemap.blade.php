@php
echo '<?xml version="1.0" encoding="utf-8"?>';
@endphp

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@unless(empty($sitemap->urls))
    @foreach ($sitemap->urls as $url)
    <url>
        <loc>{{ $url->loc }}</loc>
        <lastmod>{{ $url->lastmod }}</lastmod>
        <changefreq>{{ $url->changefreq }}</changefreq>
        <priority>{{ $url->priority }}</priority>
    </url>
    @endforeach
@endunless
</urlset>