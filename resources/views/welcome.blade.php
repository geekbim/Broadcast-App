<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Broadcast App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h4 class="text-center mt-5">Broadcast App</h4>
        <form action="/send-broadcast" method="post">
            @csrf
            <div class="form-group">
              <label for="subscriber">Subscriber</label>
              <select multiple class="form-control" id="subscriber" name="subscribers[]">
                  @foreach ($subscribers as $subscriber)
                    <option value="{{ $subscriber->email }}">{{ $subscriber->email }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="5" name="message">{{ $template }}</textarea>
            </div>
            <button class="btn btn-primary" type="submit">Send</button>
        </form>
    </div>
</body>
</html>