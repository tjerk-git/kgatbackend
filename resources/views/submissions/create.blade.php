<x-front>
<section class="the-world-is-a-museum" id="spinning_plates">

<div class="content-container">
    <h2>DEEL JOUW VONDST</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('submissions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" name="name" id="name" required value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="description">Beschrijving (optioneel)</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Je afbeelding (alleen jpg en png)</label>
            <input type="file" name="attachment" id="attachment" required accept="image/*">
        </div>

        <div class="form-group">
        <button type="submit">Verstuur</button>
        </div>
    </form>
</div>

</div>
</x-front>