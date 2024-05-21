
<div class="container">
  @if ($submission && $submission->image)
  <div class="submission">
    <h1>De vondst</h1>
    <img src="{{ asset($submission->image)}}"/>
  </div>
  @else
  <h1>Geen vondst gevonden</h1>
  @endif
</div>

<style>
img{
  width:  100%;
  height: 100%;
}

h1{
  text-align: center;
  margin-bottom: 1rem;
  margin-top:1rem;
  color:white;
}

.submission{
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
</style>