@extends('layouts.app')
@section('hd')
<title>Lista de urmariri</title>
<link rel="stylesheet" href="/css/followship.index.css">
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="bg"></div>
    <div class="container-fluid text-center">
        <h1 class="display-4">Urmăriri/Urmăritori</h1>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="user-profile">
                        <div class="profile_section_inner" style="padding-bottom: 40px;">
                            <div class="user_profile_image" style="background:url('/uploads/avatars/{{Auth::user()->imagine}}');
                            width:100px;
                            height:100px;
                            background-position:center;
                            background-size:contain;
                            border-radius:100%;
                            border:2px solid #f4f4f4;
                            margin:0 auto;
                            margin-bottom:30px;">
                            </div>
                            <div class="user_profile_name text-center">
                                <h2>{{Auth::user()->nume}} {{Auth::user()->prenume}}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="profile-info-right" id='tabs'>
                                    <ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom">
                                        <li class="active"><a href="#profile" data-toggle="tab">PROFIL</a></li>
                                        <li><a href="#followers" data-toggle="tab">URMĂRITORI</a></li>
                                        <li><a href="#following" data-toggle="tab">URMĂRIRI</a></li>
                                        <li><a href="#people" data-toggle="tab">PERSOANE</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <!-- profile -->
                                        @include('followship.partials.profile',compact('followers','followings'))
                                        <!-- followers -->
                                        @include('followship.partials.followers',compact('followers'))
                                        <!-- following -->
                                        @include('followship.partials.following',compact('followings'))
                                        <!-- people -->
                                        @include('followship.partials.people')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
    function processData(selector, action, user_id) {
        let user_action = '';
        if (action == 'unfollow') {
            user_action = 'Ești sigur că dorești să ștergi această urmărire?';
            Notiflix.Confirm.Show('Atenție', user_action, 'Da', 'Nu',
                function () { // Yes button callback 
                    axios.get("{{route('followship.userAction')}}", {
                        params: {
                            action: action,
                            user_id: user_id,
                            selector: selector
                        }
                    }).then(data => {
                        $(selector).html(data.data);
                        reloadPeople();
                    }).catch(error => {
                        console.log(error);
                    })
                },
                function () { // No button callback 
                });
        } else if (action == 'remove_follower') {
            user_action = 'Ești sigur că dorești să ștergi acest urmăritor?';
            Notiflix.Confirm.Show('Atenție', user_action, 'Da', 'Nu',
                function () { // Yes button callback 
                    axios.get("{{route('followship.userAction')}}", {
                        params: {
                            action: action,
                            user_id: user_id,
                            selector: selector
                        }
                    }).then(data => {
                        $(selector).html(data.data);
                        reloadPeople();
                    }).catch(error => {
                        console.log(error);
                    })
                },
                function () { // No button callback 
                });
        } else if (action == 'follow') {
            user_action = 'Ești sigur că dorești să urmărești acest utilizator?';
            Notiflix.Confirm.Show('Atenție', user_action, 'Da', 'Nu',
                function () { // Yes button callback 
                    axios.get("{{route('followship.userAction')}}", {
                        params: {
                            action: action,
                            user_id: user_id,
                            selector: selector
                        }
                    }).then(data => {
                        $(selector).html(data.data);
                        reloadPeople();
                    }).catch(error => {
                        console.log(error);
                    })
                },
                function () { // No button callback 
                });
        }
    }

    function reloadPeople() { //reload pagina 'persoane'
        let data = $('#userSearchInput').val();
        axios.get("{{route('followship.userAction')}}", {
            params: {
                term: data,
                action: 'reload_people',
            }
        }).then(data => {
            $('#people_show_action').html(data.data);
        }).catch(error => {
            console.log(error);
        })
    }

    function reloadFollowers() {
        axios.get("{{route('followship.reloadFollowers')}}", {

        }).then(
            data => {
                console.log(data.data);
                $('#followers_show_action').html(data.data);
            }
        )
    }

    $(document).on('submit', '#userSearch', function (event) {
        event.preventDefault();
        let data = $('#userSearchInput').val();
        axios.get("{{route('followship.search')}}", {
            params: {
                term: data
            }
        }).then(data => {
            $('#people_show_action').html(data.data);
        }).catch(error => {
            console.log(error);
        })
    })

</script>
@endsection
