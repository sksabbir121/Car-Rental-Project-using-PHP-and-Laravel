@extends('layouts.frontend')

@section('content')
    <section class="contact-us">
        <div class="container">
            <h1>Contact Us</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea name="message" class="form-control" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>

        </div>
    </section>
@endsection
