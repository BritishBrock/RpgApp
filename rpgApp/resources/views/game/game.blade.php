<?php

    $array = [];
$arrayStats = [];
    foreach($characters as $character){
        $array['name'] = $character->name;
        $array['gold'] = $character->gold;
        $array['level'] = $character->level;
        $array['xp'] = $character->xp;
        $array['xpCap'] = $character->xpCap;
        
        foreach($character_attribute as $attributes){
           $arrayStats[ $attributes->name] = $attributes->value;
            
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
 
    height:100%;
    overflow:hidden;
        }
        .background{
            width:100%;
            height:200%;
            background: repeating-linear-gradient(to bottom, #0f0a1e, #0f0a1e 2px, #140e29 2px, #140e29 4px);
            position:absolute;
            left:0;
            top:-100%;
            z-index:-1;
            animation: move 40s linear infinite;
            
            
        }
        @keyframes move{
            from{
                top:-100%;
            }
            to{
                top:0%;
            }
        }
        #dialogeBox{ 
          position: relative;
          top: 0;
          left: 0;
          opacity:1;
          height: 90px;
          color: white;
          width: 100%;
          margin: auto;
          font-size: 30px;
          line-height: 40px;
          letter-spacing: 1px;
          text-shadow: -2px 0 0 #fdff2a,
            -4px 0 0 #df4a42,
            2px 0 0 #91fcfe,
            4px 0 0 #4405fc;
            background-color:rgba(0, 0, 0, 0);
            
        }
        .textContentText{
               overflow:hidden;
               animation: type 5s steps(120, end);
               white-space: nowrap;
               width: 100%;
           }
        @keyframes type{
          from {
               width: 0;
               }
           }
        
        
        .InfoBox{
            background-color:red;
            width:100%;
            height:420px;
            margin:10px 0;
            color:white;
            display:flex;
            justify-content: space-between;
            align-items:center;
            text-shadow: -2px 0 0 #fdff2a,
            1px 0 0 #df4a42,
            1px 0 0 #91fcfe,
            1px 0 0 #4405fc;
            background-color:rgba(0, 0, 0, 0);
        }
        .infoBoxes{
             height:100%;
             width:20%;
             position:relative;
             display:flex;
             flex-direction:column;
             justify-content:center;
             align-items:center;
        }
         .infoBoxes > p{
             font-size:1.5em;
             
         }
         
         .infoBoxes::after{
             content:" ";
             width:25%;
             height:25%;
             position:absolute;
             bottom:0;
             right:0;
             border-right:10px solid white;
             border-bottom:10px solid white;
         }
         .infoBoxes::before{
             content:" ";
             width:25%;
             height:25%;
             position:absolute;
             top:0;
             left:0;
             border-left:10px solid white;
             border-top:10px solid white;
         }
         
         #buttonPlace{
         }
         button{
             border:2px solid white;
             color:white;
             font-size:2em;
             cursor:pointer;
             width:100px;
             height:50px;
             margin:10px 0;
             text-shadow: -1px 0 0 #fdff2a,
            1px 0 0 #df4a42,
            1px 0 0 #91fcfe,
            1px 0 0 #4405fc;
            background-color:rgba(0, 0, 0, 0);
         }
         button:hover{
             transform:scale(1.2);
             color:#3db8ff;
         }
    </style>
</head>
<body>
    
    <div class="background"></div>
    <div name="dialogeBox" style="resize: none;width: 100%;height: 500px;" id="dialogeBox" cols="30" rows="10" disabled></div><br>
    <input type="text"style="width:100%;font-size:36px" name="move" id="move">
    <div class="InfoBox">
        <div class="infoBoxes controls">
            <h1>Controles:</h1>
            <p>"up" ,"down" ,"left" ,"right" to move</p>
            <p>"save" to save the game</p>
            <p>"quit" to leave without saving</p>
        </div>
        <div class="playerInfo infoBoxes">
            <h1 id="pname">Name: </h1>
            <p id="plevel">level: </p>
            <p id="pgold">Gold: </p>
            <p id="pxp">Xp: </p>
            <p id="pxpCap">XpCap: </p>
        </div>
        <div class="infoBoxes" id="playerStatsMenu">
            <h1>Stats:</h1>
        </div>
        <div class="infoBoxes" id="buttonPlace">
            <h1>Action Buttons:</h1>
        </div>
        
    </div>
    @foreach($characters as $character)
    <form id="gameData"style="display:none" method="POST" action="{{url('character/game/saveGameData/'.$character->id)}}">
        @method('PUT')
        @csrf
        <input type="text"  id="name" name="name"/>
        <input type="text" id="gold" name="gold"/>
        <input type="text" id="level" name="level"/>
        <input type="text" id="xp" name="xp"/>
        <input type="text" id="xpCap" name="xpCap"/>
    </form>
    @endforeach
    <?php
        echo "<script>";
        echo "var array = [];";
        $keys = array_keys($arrayStats);
            foreach($keys as $stat){
               echo "array.push(2);";
            }
        echo"</script>";
        
        ?>
    <script>
       document.body.style.zoom = 0.9
       console.log(window)
        var lastMove = "";
        enemies = ['wolf','goblin','orc','bandit','giant','skelinton',];
        var waitingText = ["are you still there?","hello hello?","are you gonna play??","im always watching","the ghouls are ready for your meat","do you want to die?","are you listening?"];
        trades = ["statPoints"]
        
        
        var player = {
            name: "<?php echo $array['name']?>",
            stats: {
                //put here the php code so you englobe the js script in and anonymous function -_-
                //load lla of the keys and stuff in a global array adn then create a class and  method that loads keys dependgn whats in the array then put all of it in a anonymous function()
               
            },
            gold: parseInt("<?php echo $array['gold']?>"),
            level: parseInt("<?php echo $array['level']?>"),
            xp: parseInt("<?php echo $array['xp']?>"),
            xpCap: parseInt("<?php echo $array['xpCap']?>"),
        }
        </script>
        <?php
        echo "<script>";
        $keys = array_keys($arrayStats);
            foreach($keys as $stat){
               echo "player.stats['$stat']=". $arrayStats[$stat].";";
            }
        echo"</script>";
        ?>
        
        <script>
        
        
        createPlayerStatsInMenu();
        updatePlayerInfo();
        function createPlayerStatsInMenu(){
            let playerStats = document.getElementById("playerStatsMenu");
            Object.entries(player.stats).every(([key,value])=>{
              let stat = document.createElement("p");
              stat.id = "p"+ key;
              stat.textContent = key + ": "+value;
              playerStats.appendChild(stat);
              return true;  
            })
        }
        
        function updatePlayerInfo(){
            document.getElementById("pname").textContent = "name: " + player.name;
            document.getElementById("plevel").textContent = "level: " + player.level;
            document.getElementById("pgold").textContent = "Gold: " + player.gold;
            document.getElementById("pxp").textContent = "Xp: " + player.xp;
            document.getElementById("pxpCap").textContent = "Next levelUp: " + player.xpCap;
             Object.entries(player.stats).every(([key,value])=>{
              document.getElementById("p"+key).textContent = key + ": "+value;
              return true;
            })
            
            
        }
        
        
        function saveData(){
            document.getElementById("name").value = player.name;
            document.getElementById("gold").value = player.gold;
            document.getElementById("level").value = player.level;
            document.getElementById("xp").value = player.xp;
            document.getElementById("xpCap").value = player.xpCap;
            Object.entries(player.stats).every(([key,value])=>{
                let stat = document.createElement("input");
                stat.type = "text";
                stat.name = `stats[${key}]`;
                stat.value = value;
                document.getElementById("gameData").append(stat)
                return true;
            })
            document.getElementById("gameData").submit();
        }
        
        
        var inLineGame = false;
        var inGame = false;
        var inRandonNumberGame = false;
        var stillThere;
         stillThere = setInterval(()=>{
            setText(waitingText[Math.floor(Math.random()*waitingText.length)])
        },10000)
        document.getElementById('move').addEventListener('keydown',(e)=>{
            clearInterval(stillThere);
             stillThere = setInterval(()=>{
                setText(waitingText[Math.floor(Math.random()*waitingText.length)])
            },10000)
            
            if(e.key == "Enter"){
                let result = document.getElementById('move').value;
                document.getElementById('move').value = "";
                if(!inGame){
                if(result == "left" && "right" != lastMove){
                    lastMove = result;
                    setText(result)
                    genOutcome();
                }
                if(result == "right" && "left"  != lastMove){
                    lastMove = result;
                    setText(result)
                    genOutcome();
                }
                if(result == "up" && "down" != lastMove){
                    lastMove = result;
                    setText(result)
                    genOutcome();
                }
                if(result == "down" && "up" != lastMove){
                    lastMove = result;
                    setText(result)
                    genOutcome();
                }
                if(result == "stats"){
                    console.log(player)
                }
                if(result == "save"){
                   saveData();
                }
                if(result == "clear"){
                    document.getElementById("dialogeBox").textContent = "";
                }
                }else{
                    if(result == "stop" && inLineGame){
                        checkLineGame();
                        inLineGame = false;
                        inGame = false;
                    }
                    if(inRandonNumberGame){
                        if(!isNaN(result) && result !=  ""){
                            checkRandomNumGame(result);
                            inGame = false;
                            inRandonNumberGame = false;
                        }
                    }
                }
            }
        })
        function genOutcome(){
            let text;
            let outcomeNum = Math.floor(Math.random()*100);
            if(outcomeNum < 10){
                outcome = "trade";
            }else if(outcomeNum > 10 && outcomeNum < 30){
                outcome = "fight";
            }else if(outcomeNum > 30 && outcomeNum < 100){
                outcome = "game";
            }else{
                outcome = "nothing"
            }


            switch(outcome){
                case "fight":
                text= `A wild ${enemies[Math.floor(Math.random() * enemies.length)]}, would you like to run or fight`;
                    setText(text);
                    decideFight();
                    
                break;
                case "trade":
                trading();
                break;
                case "pickup":
                
                break;
                case "game":
                    createGame();
                break;
                case "nothing":
                  text = "..."
                setText(text)
                break;
            }
            updatePlayerInfo()
        }
        
        function checkLife(){
            try{
                if(player.stats.hp <= 0){
                    console.log("gameOver");
                }
            }catch(e){}
        }


        function setText(text){
            if(document.getElementById("dialogeBox").getElementsByTagName("p").length > 6 ){
                document.getElementById("dialogeBox").getElementsByTagName("p")[1].remove()
                document.getElementById("dialogeBox").getElementsByTagName("p")[0].remove()
            }
            let p = document.createElement("p");
            p.textContent = "> "+text;
            p.className = "textContentText";
            document.getElementById("dialogeBox").append(p);
        }
        
        function decideFight(){
            document.getElementById('move').disabled = true;
            let fight = document.createElement("button");
            let run = document.createElement("button");
            fight.textContent = "fight";
            run.textContent = "run";
            fight.onclick =()=>{
                let result = Math.floor(Math.random()* 100)
                if(result < 30){
                    let hploss = Math.floor(Math.random()* 10) + 1
                    let text = `you lost ${ hploss} hp`;
                    player.stats.hp -=hploss;
                    setText(text)
                    document.getElementById('move').disabled = false;
                    document.getElementsByTagName("button")[1].remove()
                    document.getElementsByTagName("button")[0].remove()
                    checkLife();
                }else{
                    let goldDrop = Math.floor(Math.random()* 10) + 1
                    let xpDrop = Math.floor(Math.random()* 10) + 1
                    let text = `you beat it and ganed ${ goldDrop} gold and ${ xpDrop} xp`;
                    player.gold += goldDrop;
                    player.xp += xpDrop;
                    setText(text)
                    document.getElementById('move').disabled = false;
                    document.getElementsByTagName("button")[1].remove()
                    document.getElementsByTagName("button")[0].remove()
                    checkLife();
                    checkLevelUp();

                }

            }
            run.onclick= ()=>{
                let result = Math.floor(Math.random()* 2)
                if(result == 0){
                    let text = `you got away safely`
                    setText(text)
                    document.getElementById('move').disabled = false;
                    document.getElementsByTagName("button")[1].remove()
                    document.getElementsByTagName("button")[0].remove()
                }else{
                    let hploss = Math.floor(Math.random()* 10)
                    let text = `you didnt get away safely and lost ${ hploss} hp`
                    player.stats.hp -=hploss;
                    setText(text)
                    document.getElementById('move').disabled = false;
                    document.getElementsByTagName("button")[1].remove()
                    document.getElementsByTagName("button")[0].remove()
                    checkLife();
                }
            }
            document.getElementById("buttonPlace").append(fight)
            document.getElementById("buttonPlace").append(run)
        
        }

        function checkLevelUp(){
            if(player.xp >= player.xpCap){
                player.xp = 0;
                player.xpCap *= 2;
                player.level++;
                Object.entries(player.stats).every(([key,value])=>{
                    player.stats[key]++;
                    return true;
                })


            }
        }

        function trading(){
            tradeNumber = Math.floor(Math.random()*trades.length);
            switch(trades[tradeNumber]){
                case "statPoints":
                    let cont = 0;
                Object.entries(player.stats).every(([key,value])=>{
                    
                    let chance = Math.floor(Math.random()*2);
                    if(chance == 1){
                        console.log();
                        genStatOffer(key)
                        return false;
                    }
                    if(cont >= Object.entries(player.stats).length - 1){
                        genStatOffer("hp");
                    }
                    cont++;
                    return true;
                })
                
            }
           
        }

        function genStatOffer(key){
            let amountOfGold = Math.floor(Math.random()*20) ;
            let amountOfstatPoints = Math.floor(Math.random()*5) + 1;
            let text = `you found a trader,would you like to buy ${amountOfstatPoints}${key} for ${amountOfGold + amountOfstatPoints} Gold`
            setText(text); 
            document.getElementById('move').disabled = true;
            let no = document.createElement("button");
            let yes = document.createElement("button");
            no.textContent = "no";
            yes.textContent = "yes";
            yes.onclick =()=>{
                    if( player.gold - amountOfGold + amountOfstatPoints < 0){
                        text = `you dont have enough gold to buy`;
                    }else{
                        text = `you decided buy -${amountOfGold + amountOfstatPoints} Gold`;
                        player.stats[key]+=amountOfstatPoints;
                        player.gold -= amountOfGold;
                    }
                    
                    setText(text)
                    document.getElementById('move').disabled = false;
                    document.getElementsByTagName("button")[1].remove()
                    document.getElementsByTagName("button")[0].remove()

                    checkLevelUp();
                }

            
            no.onclick= ()=>{
                text = "you decided to not buy anything";
                setText(text)
                document.getElementById('move').disabled = false;
                document.getElementsByTagName("button")[1].remove()
                document.getElementsByTagName("button")[0].remove()
            }
           document.getElementById("buttonPlace").append(yes)
            document.getElementById("buttonPlace").append(no)
         
        }
        
        var gameType = ["line","randomNumGame"];
        
        function createGame(){
            inGame = true;
            
            document.getElementById('move').disabled = false;
            switch(gameType[Math.floor(Math.random()*gameType.length)]){
                case "line":
                    lineGame();
                    break;
                case "randomNumGame":
                    randomNumGame();
                    break;
            }
        }
        
        var randomNum = [];
        function randomNumGame(){
            
            inRandonNumberGame = true;
            let range = Math.floor(Math.random() * 10) +1;
            
            randomNum[0] = Math.floor(Math.random() * range) + 1;
            randomNum[1] = range;
            console.log(randomNum[0])
            setText(`pick a number between 1 and ${range}`);
        }
        
        function checkRandomNumGame(num){
            
            if(num != randomNum[0]){
                setText("you lost");
            }else{
                setText("you won " + randomNum[1] + " Gold");
                player.gold += randomNum[1];
            }
        }
     
        var gameRun;
        function lineGame(){
            
            inLineGame = true;
            let lineCont = 0;
            let p = document.createElement("p");
            p.id = "lineGame";
            for(let i = 0; i < 11; i++){
                let innerLine = document.createElement("span");
                innerLine.textContent = " - ";
                if(i != 5){
                    innerLine.style.color = "white";
                }else{
                    innerLine.style.color = "green";
                }
                innerLine.style.fontSize = "2em"
                p.appendChild(innerLine);
            }
            document.getElementById("dialogeBox").appendChild(p);
            let allLines = document.getElementById("lineGame").getElementsByTagName("span");
            let direcction = "right";
             gameRun = setInterval(()=>{
                for(let i = 0; i < allLines.length;i++){
                    allLines[i].style.color = "white";
                }
                allLines[5].style.color = "green";
                allLines[lineCont].style.color = "red";
                if(direcction == "right"){
                    lineCont++;
                }else{
                    lineCont--;
                }
                if(lineCont <= 0 ){
                    direcction = "right"
                };
                if(lineCont >= allLines.length - 1){
                    direcction = "left"
                    
                };
            },100)
        }
        
        function checkLineGame(){
            let allLines = document.getElementById("lineGame").getElementsByTagName("span");
            if(allLines[5].style.color == "red"){
                clearInterval(gameRun);
                let amountOfGold = Math.floor(Math.random()  * 15);
                document.getElementById("lineGame").remove()
                setText(`you won ${amountOfGold} Gold`);
                player.gold += amountOfGold;
            }else{
                clearInterval(gameRun);
                document.getElementById("lineGame").remove()
                setText("you lost");
            }
        }

    </script>
</body>
</html>