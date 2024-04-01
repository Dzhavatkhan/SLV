const logout = () => {
    $.ajax({
    type: "GET",
    url: "{{route('logout')}}",
    processData:false,
    cache: false,
    success: function (response) {
        location.href = "{{route('home')}}"
    },
    error: function(err){
        console.log(err);

    }
});

}