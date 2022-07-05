<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Energeek Apply</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
  <div class="card px-3" style="width: 24rem;">
    <div class="mb-3">
      <label for="" class="form-label">Jabatan</label>
      <select class="form-select" id="input-jabatan">
        @foreach ($jobs as $job)
          <option value="{{ $job->id }}">{{ $job->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Name</label>
      <div class="input-group">
        <input id="input-name"
          type="text" class="form-control" placeholder="Name">
        <span class="input-group-text">@</span>
      </div>
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Phone</label>
      <div class="input-group">
        <input id="input-phone"
          type="number" class="form-control" placeholder="Phone">
        <span class="input-group-text">@</span>
      </div>
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Email</label>
      <div class="input-group">
        <input id="input-email"
          type="email" class="form-control" placeholder="Email">
        <span class="input-group-text">@</span>
      </div>
    </div>
    <div class="mb-3 dropdown">
      <label for="" class="form-label d-block">Skill Sets</label>
      <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Skill Sets
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        @foreach ($skills as $skill)
          <li class="dropdown-item">
            <input type="checkbox"
              onclick="handleSkill({{ $skill->id }})"
              name="{{ $skill->name }}"
              id="input-skill-{{ $skill->id }}">
            <label for="">{{ $skill->name }}</label>
          </li>
        @endforeach
      </ul>
    </div>
    <button id="button-submit"
      type="submit" class="btn btn-primary">Submit</button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $(document).on('click', '.dropdown-menu', function (e) {
        e.stopPropagation();
    });
    
    let skills = [];

    function handleSkill(id) {
      const index = skills.indexOf(id);
      if (index !== -1) {
        skills.splice(index, 1);
        return;
      }
      skills.push(id);
    }
    
    $('#button-submit').click(function (e) { 
      e.preventDefault();
      
      const name = $('#input-name').val();
      const phone = $('#input-phone').val();
      const email = $('#input-email').val();
      const jobId = $('#input-jabatan').val();
      const skillSets = skills;

      const request = {
        'name': name,
        'phone': phone,
        'email': email,
        'job_id': jobId,
        'skill_sets': skillSets,
      }

      // console.log(request)
      
      $.post( "api/apply/submit", request, function( data ) {
        alert(data.message);
      })
      .fail(function( jqXHR ) {
        alert(jqXHR.responseJSON.message);
      })

    });
  </script>
</body>
</html>