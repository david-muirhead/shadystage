@extends('layouts.app')

<div class="mt-36 w-full p-8 z-10 flex flex-col items-center">
    @php
    $featured_releases = new WP_Query([
        'post_type' => 'releases',
        'meta_query' => [
            'relation' => 'AND',
            [
                'key' => 'feature',
                'value' => '1',
                'compare' => '='
            ],
            [
                'key' => 'project',
                'value' => 'clubsmoke',
                'compare' => '=='
            ]
        ]
    ]);
    @endphp

    @if($featured_releases->have_posts())
        @while($featured_releases->have_posts())
            @php $featured_releases->the_post() @endphp
            
            <span class="relative top-5 text-h1-m rotate-25 drop-shadow-sm">@field('title')</span>
            
            <div class="feature release group pb-10 w-full max-w-4xl px-4 flex flex-col items-center">
                @if($artwork = get_field('artwork_front'))
                    <img class="front" src="{{ $artwork }}" alt="Release Artwork">
                @endif
            </div>

            <div class="info inline-block cursor-pointer">
                <span class="text-h3">@field('format')</span>
                <span class="text-h2 block">@field('year')</span>
                
                @if(have_rows('links'))
                    <div class="linx">
                        @while(have_rows('links'))
                            @php
                            the_row();
                            $link = get_sub_field('link');
                            @endphp

                            @if($link)
                                <a href="{{ esc_url($link['url']) }}" 
                                   target="{{ $link['target'] ?: '_self' }}">
                                    {{ esc_html($link['title']) }}
                                </a>
                            @endif
                        @endwhile
                    </div>
                @endif
            </div>

            @if($visual = get_field('visual'))
                <div class="visual">
                    @php
                    preg_match('/src="(.+?)"/', $visual, $matches);
                    $src = $matches[1];
                    
                    $params = [
                        'controls' => 0,
                        'hd' => 1,
                        'autohide' => 1
                    ];
                    
                    $new_src = add_query_arg($params, $src);
                    $iframe = str_replace($src, $new_src, $visual);
                    $iframe = str_replace('></iframe>', ' frameborder="0"></iframe>', $iframe);
                    
                    echo $iframe;
                    @endphp
                </div>
            @endif
        @endwhile
        @php wp_reset_postdata() @endphp
    @endif
</div>

<div class="md:grid md:grid-cols-3 md:gap-3">
    @php
    $video_releases = new WP_Query([
        'post_type' => 'releases',
        'meta_query' => [
            'relation' => 'AND',
            [
                'key' => 'visual',
                'value' => [''],
                'compare' => 'NOT IN'
            ],
            [
                'key' => 'project',
                'value' => 'clubsmoke',
                'compare' => 'LIKE'
            ]
        ]
    ]);
    @endphp

    @if($video_releases->have_posts())
        @while($video_releases->have_posts())
            @php $video_releases->the_post() @endphp
            
            <div class="release relative block aspect-video text-stone-900">
                <div class="absolute info font-mono text-sm text-stone-900 top-0 z-10 text-h2">
                    @hasfield('title')
                        <span class="inline-block rounded-lg px-2 ml-2 bg-sh80-offwhite mt-2">@field('title')</span>
                    @endfield
                    @hasfield('format')
                        <span class="rounded-lg px-2 ml-2 bg-sh80-offwhite mt-2">@field('format')</span>
                    @endfield
                    @hasfield('year')
                        <span class="rounded-lg px-2 ml-2 bg-sh80-offwhite mt-2">@field('year')</span>
                    @endfield
                </div>

                @if($visual = get_field('visual'))
                    <div class="video-container aspect-video z-0 absolute top-0">
                        <img class="video-thumbnail object-cover w-full h-full" 
                             src="@field('artwork_front')" 
                             alt="Video Thumbnail"
                             data-video-url="@field('visual')">
                    </div>
                @endif
            </div>
        @endwhile
        @php wp_reset_postdata() @endphp
    @endif
</div>

