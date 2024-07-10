<x-admin>
  <h1>Kijkgat inzendingen</h1>

  <dialog>
    <button autofocus>Close</button>
    <div class="submission-dialog"></div>
  </dialog>

  <table>
    <thead>
      <tr>
        <th>Naam</th>
        <th>E-mail</th>
        <th>Datum</th>
        <th>Thema</th>
        <th>Acties</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($submissions as $submission)
      <tr class="{{ !$submission->is_confirmed ? 'not-confirmed' : '' }}">
        <td>{{ $submission->name }}</td>
        <td>{{ $submission->email }}</td>
        <td>{{ $submission->created_at->format('d-m-Y H:i') }}</td>
        <td>
          <select name="theme" hx-post="{{ route('submissions.update', $submission->id) }}" hx-headers="{{ json_encode(['X-CSRF-TOKEN' => csrf_token()]) }}" hx-swap="outerHTML">
            <option value="">Selecteer een thema</option>
            <option value="textuur" {{ $submission->theme == 'textuur' ? 'selected' : '' }}>#1 Textuur</option>
          </select>
          </select>
        </td>
        </td>
        <td>
          <button hx-get="{{ route('submissions.show', $submission->id) }}" hx-target=".submission-dialog" hx-swap="innerHTML" class="button outline show-dialog">
            Bekijken
          </button>
          @if (!$submission->is_approved || !$submission->is_confirmed)
          <button hx-post="{{ route('submissions.allow', $submission->id) }}" hx-headers="{{ json_encode(['X-CSRF-TOKEN' => csrf_token()]) }}" hx-swap="outerHTML" hx-target="this" class="button button-primary">
            Toestaan
          </button>
          @elseif ($submission->is_approved)

          @endif
          <a href="#" hx-delete="{{ route('submissions.destroy', $submission->id) }}" hx-headers="{{ json_encode(['X-CSRF-TOKEN' => csrf_token()]) }}" hx-confirm="Weet je zeker dat je deze inzending wilt verwijderen?" hx-swap="outerHTML" hx-target="closest tr" class="contrast outline">
            Verwijderen
          </a>



      </tr>
      @endforeach
    </tbody>
  </table>

  <style>
    .not-confirmed {
      opacity: 0.3;
    }

    dialog {
      width: 100%;
      height: 100%;
      padding: 2rem;
      position: fixed;
      top: 0;
      left: 0;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

  </style>

  <script>
    const dialog = document.querySelector("dialog");
    const showButtons = document.querySelectorAll(".show-dialog");
    const closeButton = document.querySelector("dialog button");

    // add event listener for each showButton
    showButtons.forEach((showButton) => {
      showButton.addEventListener("click", () => {
        dialog.showModal();
      });
    });

    // "Close" button closes the dialog
    closeButton.addEventListener("click", () => {
      dialog.close();
    });

  </script>

</x-admin>
