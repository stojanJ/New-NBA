
<!DOCTYPE html>
<html lang="en">
<body>
    <h5>
        "Hello {{$user->name}}, click on link blow  to confirme you account"
    </h5>
    <h6>
        <a href="{{ url('/verification/'.$user->id.'/'.$user->token)}}"> Confirm your account</a>
    </h6>
</body>
</html>