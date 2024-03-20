<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    
    @foreach ($designs as $design)
    <url>
        <loc>{{ url('/') }}/design/list/{{ $design->id }}</loc>
        <lastmod>{{ $design->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.8</priority>
        <image:image>
        <image:loc>{{ url($design->image) }}</image:loc>
        <image:title>{{ $design->name }}</image:title>
    </image:image>
    </url>
    @endforeach

    @foreach ($artists as $artist)
    <url>
        <loc>{{ url('/') }}/design/list/{{ $artist->id }}</loc>
        <lastmod>{{ $artist->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($threads as $thread)
    <url>
        <loc>{{ url('/') }}/bbs/index/{{ $thread->id }}</loc>
        <lastmod>{{ $thread->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
    
    @foreach ($newses as $news)
    <url>
        <loc>{{ url('/') }}/news/page{{ $news->id }}</loc>
        <lastmod>{{ $news->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>