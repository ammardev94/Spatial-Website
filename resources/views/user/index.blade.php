@extends('user.default')

@section('css')
<style>
    .economic-table-wrapper {
        background: #1a1c1e;
        border-radius: 8px;
        padding: 0;
        overflow: auto;
        border: 1px solid #2d3035;
        max-height: 600px;
        /* Fixed height for scrollability */
    }

    .economic-table thead th {
        position: sticky;
        top: 0;
        z-index: 10;
        background: #25282c;
        box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
    }

    .economic-table {
        width: 100%;
        border-collapse: collapse;
        color: #fff;
        font-size: 14px;
    }

    .economic-table th {
        padding: 12px 15px;
        text-align: left;
        font-weight: 600;
        color: #7b878d;
        border-bottom: 2px solid #2d3035;
        white-space: nowrap;
    }

    .economic-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #2d3035;
        white-space: nowrap;
        font-weight: 500;
    }

    .economic-table tr.highlight {
        background: rgba(30, 67, 107, 0.4);
    }

    .economic-table tr:hover {
        background: rgba(255, 255, 255, 0.05);
    }

    .text-green {
        color: #44db44 !important;
    }

    .text-red {
        color: #ff5e5e !important;
    }

    .text-blue {
        color: #4da3ff !important;
    }

    .country-name {
        font-weight: 700;
        color: #fff;
    }
</style>
@endsection


@section('content')
<!-- Page Header -->
<div class="page-topbar d-md-flex d-block align-items-center justify-content-between ">
    <div class="left-column my-auto mb-2">
        <a id="toggle_btn" href="javascript:void(0);">
            <img src="{{ asset('images/nav-btn.png') }}" alt="">
        </a>
        <h3 class="page-title mb-0">Good Morning, {{ auth()->guard('user')->user()->name }}</h3>
    </div>
    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
        <div class="main-searchbar">
            @include('user.partials.global-search')
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path
                        d="M12.8042 6.40204C12.8042 4.96339 12.3196 3.56668 11.4286 2.43714C10.5376 1.3076 9.29216 0.511087 7.89307 0.176041C6.49398 -0.159004 5.02282 -0.0130482 3.71683 0.590371C2.41085 1.19379 1.34617 2.2195 0.694495 3.50209C0.0428191 4.78467 -0.157867 6.24937 0.1248 7.65998C0.407467 9.07058 1.15701 10.3449 2.25255 11.2773C3.3481 12.2098 4.72578 12.7461 6.16343 12.7997C7.60107 12.8534 9.01489 12.4212 10.1769 11.573L14.2816 15.6752L15.6753 14.2815L11.573 10.1768C12.3752 9.08193 12.8066 7.75935 12.8042 6.40204ZM1.96988 6.40204C1.96988 5.52543 2.22982 4.66851 2.71684 3.93963C3.20386 3.21076 3.89608 2.64267 4.70596 2.30721C5.51584 1.97174 6.40701 1.88397 7.26677 2.05499C8.12654 2.22601 8.91628 2.64813 9.53614 3.26799C10.156 3.88785 10.5781 4.67759 10.7491 5.53735C10.9202 6.39712 10.8324 7.28829 10.4969 8.09817C10.1615 8.90805 9.59337 9.60027 8.8645 10.0873C8.13562 10.5743 7.2787 10.8342 6.40209 10.8342C5.2266 10.8342 4.09925 10.3673 3.26804 9.53608C2.43684 8.70488 1.96988 7.57753 1.96988 6.40204Z"
                        fill="#7B878D" />
                </svg>
            </button>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="listing-main">
    <div class="row g-0">
        <div class="col-lg-9">
            <div class="listing-cards-main row g-0">
                @empty(!$featuredInsight)
                <div class="col-md-12">
                    <a href="{{ route('user.insight.show', [$featuredInsight->id]) }}" class="card featured-box">
                        <div class="card-body d-flex align-items-end position-relative"
                            style="height: 250px; background-image: url({{ asset('storage/'. $featuredInsight->img) }}); background-size: cover;">
                            <div class="position-absolute w-100 h-100 top-0 start-0"
                                style="background: rgba(0,0,0,0.4);"></div>
                            <div class="card-text">
                                <h3 class="h3 text-white mb-0 position-relative">
                                    <!-- {!! $featuredInsight->description !!} -->
                                    {{ \Illuminate\Support\Str::limit(strip_tags($featuredInsight->title), 300) }}
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
                @endempty
                @forelse ($insights as $insight)
                <div class="col-md-4">
                    <a href="{{ route('user.insight.show', [$insight->id]) }}" class="card mainbox">
                        <div class="card-body">
                            <h6 class="card-title text-uppercase">{{ $insight->title }}</h6>
                            <p class="card-text text-muted">
                                {{ \Illuminate\Support\Str::limit(strip_tags($insight->description), 250) }}

                            </p>
                            <p class="card-text created-at text-muted mb-0">{{ $insight->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </a>
                </div>
                @empty
                <p class="text-muted">No insigths are found</p>
                @endforelse
            </div>
        </div>
        <div class="col-lg-3">
            <div class="dashboard-rightbox">
                <div class="chart-wrapper">
                    <img src="{{ asset('images/chart-img-1.png') }}" alt="">
                </div>
                <div class="chart-wrapper">
                    <img src="{{ asset('images/chart-img-2.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="economic-table-wrapper mb-4">
                <table class="economic-table">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>GDP</th>
                            <th>GDP Growth</th>
                            <th>Interest Rate</th>
                            <th>Inflation Rate</th>
                            <th>Jobless Rate</th>
                            <th>Gov. Budget</th>
                            <th>Debt/GDP</th>
                            <th>Current Account</th>
                            <th>Population</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($economicData as $country => $data)
                        <tr class="{{ in_array($country, ['Germany', 'Japan', 'United States']) ? 'highlight' : '' }}">
                            <td class="country-name">{{ $country }}</td>
                            @foreach(['GDP', 'GDP Growth', 'Interest Rate', 'Inflation Rate', 'Jobless Rate', 'Gov.
                            Budget', 'Debt/GDP', 'Current Account', 'Population'] as $indicator)
                            @php
                            $val = $data[$indicator]['value'] ?? '-';
                            $trend = $data[$indicator]['trend'] ?? 'neutral';
                            $class = '';
                            if ($indicator == 'GDP' && !in_array($country, ['Japan'])) $class = 'text-blue';
                            if ($trend == 'green') $class = 'text-green';
                            if ($trend == 'red') $class = 'text-red';

                            if ($indicator == 'Population' && in_array($country, ['Japan', 'Germany'])) {
                            $class .= ' text-decoration-underline';
                            }
                            if ($indicator == 'Population' && $country == 'China') $class = 'text-blue';
                            @endphp
                            <td class="{{ $class }}">
                                @if(is_numeric($val))
                                @php
                                $decimals = ($indicator == 'GDP' || $indicator == 'Population') ? 0 : 2;
                                @endphp
                                {{ number_format($val, $decimals, '.', '') }}
                                @else
                                {{ $val }}
                                @endif
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection