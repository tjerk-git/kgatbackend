<x-layout>
<h1>Kijkgat inzendingen</h1>
<table>
  <thead>
    <tr>
      <th>Naam</th>
      <th>E-mail</th>
      <th>Inzending</th>
      <th>Datum inzending</th>
      <th>Thema</th>
      <th>Goedkeuren</th>
      <th>Verwijderen</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($submissions as $submission)
    <tr class="{{ !$submission->is_confirmed ? 'not-confirmed' : '' }}">
      <td>{{ $submission->name }}</td>
      <td>{{ $submission->email }}</td>
      <td><img src="{{ asset($submission->image) }}" alt="Submission Image"></td>
      <td>{{ $submission->created_at->format('d-m-Y H:i') }}</td>
      <td>
        @if ($submission->theme)
        <select name="theme" hx-post="{{ route('submissions.update', $submission->id) }}" hx-headers="{{ json_encode(['X-CSRF-TOKEN' => csrf_token()]) }}" hx-swap="outerHTML">
          <option value="" selected>Selecteer een thema</option>
          <option value="Shoegaze" {{ $submission->theme == 'Shoegaze' ? 'selected' : '' }}>Shoegaze</option>
          <option value="Bomen" {{ $submission->theme == 'Bomen' ? 'selected' : '' }}>Bomen</option>
        </select>
        </select>
        @else
        <select name="theme" hx-post="{{ route('submissions.update', $submission->id) }}" hx-headers="{{ json_encode(['X-CSRF-TOKEN' => csrf_token()]) }}" hx-swap="outerHTML">
          <option value="" selected>Selecteer een thema</option>
          <option value="Shoegaze">Shoegaze</option>
          <option value="Bomen">Bomen</option>
        </select>
        @endif
      </td>
      </td>
      <td>
        @if (!$submission->is_approved)
        <button
          hx-post="{{ route('submissions.allow', $submission->id) }}"
          hx-headers="{{ json_encode(['X-CSRF-TOKEN' => csrf_token()]) }}"
          hx-swap="outerHTML"
          hx-target="this"
          class="button button-primary"
        >
          Toestaan
        </button>
        @else
        ✅
        @endif
      </td>
      <td>
        <button
          hx-delete="{{ route('submissions.destroy', $submission->id) }}"
          hx-headers="{{ json_encode(['X-CSRF-TOKEN' => csrf_token()]) }}"
          hx-confirm="Weet je zeker dat je deze inzending wilt verwijderen?"
          hx-swap="outerHTML"
          hx-target="closest tr"
          class="contrast outline"
        >
          Verwijderen
        </button>
    </tr>
    @endforeach
  </tbody>
</table>

<style>
img {
  max-width: 200px;
  max-height: 200px;
}

.not-confirmed{
  opacity: 0.3;
}

</style>

</x-layout>