<?php
require_once'./Controller/checkSession.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <div class="container">
        <div id="rulesPar" class="rules">
                <p style="text-align: center;font-size: 50px"><?php echo ("Welcome Back ".$_SESSION['userData']['username'])?></p>
                <div class="titles">QuizzYD Rules</div>
                <p>1. You have 30 secondes in every question.</p>
                <p>2. You can't back into the previous question if you click "Next".</p>
                <p>3. You can't see your score until the end of the quizz.</p>
                <p>4. You have 500 points for every correct question.</p>
                <div>
                    <button type="button" class="startQuiz" onclick="startQuiz()">Start Quizz</button>
                </div>

        </div>

        <div id="answerPar" class="hidden" >
            <h1>Choose the correct answer</h1>
            <div class="progress-bar">
                <div class="progress-done">

                </div>
            </div>
            <div class="question">
                <h2 id="questionTitle">test question please choose</h2>
            </div>

            <div id="progress-Time" class="progress-Time">
                <div id="Bar-Time"></div>
            </div>


            <div class="answerContainer">
                <button type="button" id="1"  class="answerBefor">test answer 1</button>
                <button type="button" id="2"  class="answerBefor">test answer 2</button>
                <button type="button" id="3"  class="answerBefor">test answer 3</button>
                <button type="button" id="4"  class="answerBefor">test answer 4</button>
            </div>
        </div>


        <div class="scrour hidden" id="scrPar">
            <p>your Current score  is <span id="scr">12</span></p>
            <p>your top score  is <span id="topScr">12</span></p>
            <div>
                <button type="button" class="startQuiz" onclick="retake()()">Retake</button>
                <button type="button" class="startQuiz" onclick="logOut()">LogOut</button>
                <button type="button" class="startQuiz" onclick="startQuiz()">my Data</button>
            </div>
        </div>
    </div>


    <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">My Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="username" class="col-form-label">User name</label>
                            <input type="text" class="form-control"  id="username">
                        </div>
                        <div class="form-group">
                            <label for="score" class="col-form-label">Score</label>
                            <input type="text" class="form-control"  id="score">
                        </div>
                        <div class="form-group">
                            <label for="os" class="col-form-label">Operating System</label>
                            <input type="text" class="form-control"  id="os">
                        </div>
                        <div class="form-group">
                            <label for="browser" class="col-form-label">browser</label>
                            <input type="text" class="form-control"  id="browser">
                        </div>
                        <div class="form-group">
                            <label for="ip" class="col-form-label">Ip Address</label>
                            <input type="text" class="form-control"  id="ip">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./assets/script.js"></script>

</body>
</html>