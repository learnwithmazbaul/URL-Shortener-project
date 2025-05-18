@extends('layout.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center text-primary fw-bold mb-4">Short URL</h2>
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold mb-4">Paste the URL to be shortened</h5>

                        <!-- Form Start -->
    <form action="{{ route('shortend.url') }}" method="POST" class="d-flex mb-4 input-group">
        @csrf
        <input type="url" name="url" class="form-control" style="padding: 13px 10px;"
            placeholder="Enter the link here" required>
        <button type="submit" class="btn btn-primary">Shorten URL</button>
    </form>

                        <p class="text-muted small mb-4">
                            ShortURL is a free tool to shorten URLs and generate short links.<br>
                            URL shortener allows to create a shortened link making it easy to share.
                        </p>

                        <!-- Table Start -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-primary">
                                    <tr style="text-align: left;">
                                        <th>Original URL</th>
                                        <th>Short URL</th>
                                    </tr>
                                </thead>


                            <tbody style="text-align: left;">

    @foreach ($allItems as $item)
        <tr>
            <td>{{ $item->original_url}}</td>
            <td>
                <a href="{{ url($item->shortened_url) }}" target="_blank">{{ url($item->shortened_url) }}</a>
            </td>
        </tr>
    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Table End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
