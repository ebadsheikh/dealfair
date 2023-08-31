@unless ($breadcrumbs->isEmpty())
    <ol class="breadcrumb breadcrumb-separatorless text-muted fs-6 fw-semibold">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item dealfair-text-underline">
                    <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
            @else
                <li class="breadcrumb-item text-muted">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>
@endunless
