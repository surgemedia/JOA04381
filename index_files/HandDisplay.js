function LoadBridgeFormatter() {




    function hCreateStyleSheet(sLink) {
        var head = document.getElementsByTagName('head')[0],
            link = document.createElement('link'); // create the link node
        link.setAttribute('href', sLink);
        link.setAttribute('rel', 'stylesheet');
        link.setAttribute('type', 'text/css');

        var sheet, cssRules;
        // get the correct properties to check for depending on the browser
        if ('sheet' in link) {
            sheet = 'sheet';
            cssRules = 'cssRules';
        } else {
            sheet = 'styleSheet';
            cssRules = 'rules';
        }
        head.appendChild(link); // insert the link node into the DOM and start loading the style sheet
    }

    function BridgeFormatter(tOriginal, displayStyle) {


        function displayAuction(bn) {

            function getVul2() {
                var temp = bn;
                var vulArr = [" ", "Nil", "NS", "EW", "All", "NS", "EW", "All", "Nil", "EW", "All", "Nil", "NS", "All", "Nil", "NS", "EW"];
                while (temp > 16) {
                    temp -= 16;
                }
                var vul = vulArr[temp];
                return vul;
            }
            //var temp = Auction.slice();
            var temp = Auction.split('.');
            var vul = getVul2();
            var ewvul, nsvul;
            if (vul == "Nil" || vul == "NS") {
                ewvul = "nonvul";
            } else {
                ewvul = "vul";
            }
            if (vul == "Nil" || vul == "EW") {
                nsvul = "nonvul";
            } else {
                nsvul = "vul";
            }
	    

            var txt = "<div><div><div class='mMainDisplayAuctionBid " + ewvul + " ' >W</div><div class='mMainDisplayAuctionBid " + nsvul + " '>N</div><div class='mMainDisplayAuctionBid auctionfadeAAA " + ewvul + " '>E</div><div class='mMainDisplayAuctionBid auctionfadeAAA " + nsvul + " '>S</div></div></div>";

            txt += "<div class='auctionnewline'>";
            var l, i, count, b;
            count = bn;
            while (count > 4) {
                count -= 4;
            }
            if (count < 4) {
                for (i = 0; i < count; i++) {
                    temp.unshift('-');
                }
            }
            count = 0;

            l = temp.length;

            var active = "auctionactive";

            for (i = 0; i < l; i++) {
                b = temp[i];
                if (b == "-") {
                    txt += "<div class='mMainDisplayAuctionBid'>-</div>";
                } else if (b == "NB") {
                    txt += "<div class='mMainDisplayAuctionBid " + active + "'>P</div>";
                } else if (b == "X") {
                    txt += "<div class='mMainDisplayAuctionBid " + active + "'>" + b + "</div>";
                } else if (b == "XX") {
                    txt += "<div class='mMainDisplayAuctionBid " + active + "'>" + b + "</div>";
                } else if (b == "<div class='mMainDisplayAuctionBid " + active + "'>?</div>") {
                    txt += "?";
                } else {
                    var suit = b.substr(1, 1);
                    switch (suit) {
                    case "t":
                        suit = "NT";
                        break;
                    case "s":
                        suit = "<span class='spadesuit'>&spades;</span>";//"<img class='mMainDisplayAuctionSuitBtnImgPos' src='http://skybridgeclub.com/img/cards/spade.png' />";
                        break;
                    case "h":
                        suit = "<span class='heartsuit'>&hearts;</span>";//"<img class='mMainDisplayAuctionSuitBtnImgPos' src='http://skybridgeclub.com/img/cards/heart.png' />";
                        break;
                    case "d":
                        suit = "<span class='diamondsuit'>&diams;</span>";//"<img class='mMainDisplayAuctionSuitBtnImgPos' src='http://skybridgeclub.com/img/cards/diamond.png' />";
                        break;
                    case "c":
                        suit = "<span class='clubsuit'>&clubs;</span>";//"<img class='mMainDisplayAuctionSuitBtnImgPos' src='http://skybridgeclub.com/img/cards/club.png' />";
                        break;
                    }
		    txt += "<div class='mMainDisplayAuctionBid " + active + "'>" + b.substr(0, 1)  + suit + "</div>";
                    //txt += "<div class='mMainDisplayAuctionBid " + active + "'><div class='mMainDisplayAuctionSuitBtnImgPosDivA'>" + b.substr(0, 1) + "</div><div class='mMainDisplayAuctionSuitBtnImgPosDiv'>" + suit + "</div></div>";
                }
                count++;
                if (count == 4) {
                    count = 0;
                    txt += "</div><div class='auctionnewline'>";
                }
            }
            if (count > 0) {
                while (count < 4) {
                    txt += "<div class='mMainDisplayAuctionBid'>&nbsp;</div>";
                    count++;
                }
                txt += "</div><div class='auctionnewline'>";
            }

            txt += "</div>";

            return txt;
        }

        function shortMe(hand) {

            var decoded = "";
            var $trans = new Array()
            $trans[' '] = 'y';
            $trans['.'] = 't';
            $trans['2'] = 'h';
            $trans['3'] = 'e';
            $trans['4'] = 'q';
            $trans['5'] = 'u';
            $trans['6'] = 'i';
            $trans['7'] = 'c';
            $trans['8'] = 'k';
            $trans['9'] = 'b';
            $trans['T'] = 'r';
            $trans['J'] = 'v';
            $trans['Q'] = 'w';
            $trans['K'] = 'm';
            $trans['A'] = 'f';
            $trans['n'] = 'n';
            $trans['o'] = 'o';
            $trans['s'] = 's';
            $trans['0'] = '0';
            $trans['1'] = '1';
            for (var i = 0; i < hand.length; i++) {
                decoded += $trans[hand.charAt(i)];
            }
            return decoded;

        }

        function createCards(arr, suit, display) {
            var suitClass, suitSymbol;
            var t = "";
            switch (suit) {
            case "s":
                suitClass = "spadesuit";
                suitSymbol = "&spades;";
                break;
            case "h":
                suitClass = "heartsuit";
                suitSymbol = "&hearts;";
                break;
            case "d":
                suitClass = "diamondsuit";
                suitSymbol = "&diams;";
                break;
            case "c":
                suitClass = "clubsuit";
                suitSymbol = "&clubs;";
                break;
            }
            for (var p = 0; p < arr.length; p++) {
                if (displayStyle == "Simple") {
                    t += arr[p];
                } else {
                    t += "<div class='gamecard " + display + " card rankTH H'><div class='cardfont'>" + arr[p] + "</br><span class='" + suitClass + "'>" + suitSymbol + "</span></div></div>";
                }
            }
            return t;
        }



        var m;
        var tHand;
        var aHand;
        var tSpades;
        var aSpades;
        var tHearts;
        var aHearts;
        var tDiamonds;
        var aDiamonds;
        var tClubs;
        var aClubs;
        var tHand2;
        var aHand2;
        var tSpades2;
        var aSpades2;
        var tHearts2;
        var aHearts2;
        var tDiamonds2;
        var aDiamonds2;
        var tClubs2;
        var aClubs2;



        var fontSize = "20";

        m = tOriginal.match(/<div class="mHandDisplay">(.*?)<\/div>/);
        var mHandDisplay;
        if (m == null) {
            mHandDisplay = null;
        } else {
            mHandDisplay = m[1];
        }

        m = tOriginal.match(/<div class="BackImage">(.*?)<\/div>/);
        var BackImage;
        if (m == null) {
            BackImage = null;
        } else {
            BackImage = m[1];
        }

        m = tOriginal.match(/<div class="CenterSouth">(.*?)<\/div>/);
        var CenterSouth;
        if (m == null) {
            CenterSouth = null;
        } else {
            CenterSouth = m[1];
        }

        m = tOriginal.match(/<div class="CenterNorth">(.*?)<\/div>/);
        var CenterNorth;
        if (m == null) {
            CenterNorth = null;
        } else {
            CenterNorth = m[1];
        }
        m = tOriginal.match(/<div class="CenterEast">(.*?)<\/div>/);
        var CenterEast;
        if (m == null) {
            CenterEast = null;
        } else {
            CenterEast = m[1];
        }
        m = tOriginal.match(/<div class="CenterWest">(.*?)<\/div>/);
        var CenterWest;
        if (m == null) {
            CenterWest = null;
        } else {
            CenterWest = m[1];
        }

        m = tOriginal.match(/<div class="Auction">(.*?)<\/div>/);
        var Auction;
        if (m == null) {
            Auction = null;
        } else {
            Auction = m[1];
        }


        m = tOriginal.match(/<div class="HandNumber">(.*?)<\/div>/);
        var HandNumber;
        if (m == null) {
            HandNumber = "1";
        } else {
            HandNumber = m[1];
        }


        m = tOriginal.match(/<div class="Play">(.*?)<\/div>/);
        var Play;
        if (m == null) {
            Play = "none";
        } else if (m[1] == "true" || m[1] == "truefalse") {
            Play = "true";
        } else {
	    Play = m[1];
	}
	

        m = tOriginal.match(/<div class="MyPage">(.*?)<\/div>/);
        var MyPage;
        if (m == null) {
            MyPage = null;
        } else {
            MyPage = m[1];
        }
        m = tOriginal.match(/<div class="Display">(.*?)<\/div>/);
        var Display;
        if (m == null) {
            Display = null;
        } else {
            Display = m[1];
        }


        var southVis = "normal";
        var northVis = "normal";
        var eastVis = "normal";
        var westVis = "normal";
        if (Display == 'NS') {
            eastVis = "hiddenCard";
            westVis = "hiddenCard";
        }
        if (Display == 'SW') {
            eastVis = "hiddenCard";
            northVis = "hiddenCard";
        }
        if (Display == 'SE') {
            westVis = "hiddenCard";
            northVis = "hiddenCard";
        }
        if (Display == 'S') {
            eastVis = "hiddenCard";
            westVis = "hiddenCard";
            northVis = "hiddenCard";
        }
        if (Display == 'none') {
            eastVis = "hiddenCard";
            westVis = "hiddenCard";
            northVis = "hiddenCard";
	    southVis = "hiddenCard";
        }

        var tNew = "";

        //mMainDisplayAll  open
        if (displayStyle == "Simple") {
            tNew += "<div class='mMainDisplayAllSimple' >";
        } else if (BackImage == null) {
            tNew += "<div class='mMainDisplayAll' style='background-image:url(\"http://bridge2go.com/Live/Images/play-screen-empty-blue.jpg\");   '>";
        } else {
            tNew += "<div class='mMainDisplayAll' style='background-image:url(\"" + BackImage + "\");   '>";
        }
	
	    //mMainDisplayTable  open
        if (displayStyle == "Simple") {
            tNew += "<div class='mMainDisplayTableSimple'>";
        } else if (BackImage == null) {
            tNew += "<div class='mMainDisplayTable'>";
        } else {
            tNew += "<div class='mMainDisplayTable'>";
        }
	

	
        if (mHandDisplay != null) {

	
            var aHandDisplay = mHandDisplay.split(" ");
            tHand = aHandDisplay[1];
            if (tHand == undefined) {
                tHand = "...";
                northVis = "nocards";
            }

            if (northVis == "normal") {

                //section mMainDisplayNorth open
                tNew += "<div class='mMainDisplayNorth'>";
                if (displayStyle == "Simple") {
                    tNew += "<div style='margin-left: 50px'>";
                } else {
                    tNew += "<div class='hand' style='font-size: " + fontSize + "px; width: 13em'>";
                }

                aHand = tHand.split('.');
                tSpades = aHand[0];
                aSpades = tSpades.split("");
                tHearts = aHand[1];
                aHearts = tHearts.split("");
                tDiamonds = aHand[2];
                aDiamonds = tDiamonds.split("");
                tClubs = aHand[3];
                aClubs = tClubs.split("");
                if (displayStyle == "Simple") {
                    tNew += "<div>&spades; " + createCards(aSpades, "s", northVis) + "</div>";
                    tNew += "<div><span style='color:red'>&hearts;</span> " + createCards(aHearts, "h", northVis) + "</div>";
                    tNew += "<div><span style='color:red'>&diams;</span> " + createCards(aDiamonds, "d", northVis) + "</div>";
                    tNew += "<div>&clubs; " + createCards(aClubs, "c", northVis) + "</div>";
                } else {
                    tNew += createCards(aSpades, "s", northVis);
                    tNew += createCards(aHearts, "h", northVis);
                    tNew += createCards(aDiamonds, "d", northVis);
                    tNew += createCards(aClubs, "c", northVis);
                }

                tNew += "</div>";
                //section mMainDisplayNorth end    
                tNew += "</div>";

            } else {
                tNew += "<div class='mMainDisplayNorth'>";
                if (displayStyle == "Simple") {
                    tNew += "<div style='margin-left: 50px'>";
                } else {
                    tNew += "<div class='hand' style='font-size: " + fontSize + "px; width: 13em'>";
		    tNew += "<div class='nsspace'>&nbsp;</div>";
                }

		
		
		
                tNew += "</div>"; //end hand
                tNew += "</div>"; //end mMainDisplayNorth				
            }

            tNew += "<div class='mMainDisplayEastWest'>";
            tNew += "<div class='mMainDisplayCardsEastWest'>";

            tHand = aHandDisplay[2];
            if (tHand == undefined) {
                tHand = "...";
                eastVis = "nocards";
            }
            aHand = tHand.split('.');
            tSpades = aHand[0];
            aSpades = tSpades.split("");
            tHearts = aHand[1];
            aHearts = tHearts.split("");
            tDiamonds = aHand[2];
            aDiamonds = tDiamonds.split("");
            tClubs = aHand[3];
            aClubs = tClubs.split("");

            tHand2 = aHandDisplay[3];
            if (tHand2 == undefined) {
                tHand2 = "...";
                westVis = "nocards";
            }
            aHand2 = tHand2.split('.');
            tSpades2 = aHand2[0];
            aSpades2 = tSpades2.split("");
            tHearts2 = aHand2[1];
            aHearts2 = tHearts2.split("");
            tDiamonds2 = aHand2[2];
            aDiamonds2 = tDiamonds2.split("");
            tClubs2 = aHand2[3];
            aClubs2 = tClubs2.split("");
	    

            if (eastVis == "hiddenCard" && westVis == "hiddenCard" && displayStyle == "Simple") {
		//		
	    } else if (eastVis != "nocards" || westVis != "nocards") {

                tNew += "<div class='cards_ew_suit-no-redundant'>";
                if (displayStyle == "Simple") {
		
                    tNew += "<div class='mMainDisplaySimplehandew'>";
                    tNew += "<div>&spades; ";
                    tNew += createCards(aSpades2, "s", westVis);
                    tNew += "</div>";
                    tNew += "</div>";

		    if (eastVis == "normal") {
			tNew += "<div class='mMainDisplaySimplehandew'>";
			tNew += "<div>&spades; ";
			tNew += createCards(aSpades, "s", eastVis);
			tNew += "</div>";
			tNew += "</div>";			
		    }

                    
                } else {
                    tNew += "<div class='mMainDisplayhandw'>";
                    tNew += "<div class='hand' style='font-size: " + fontSize + "px; width: 2em'>";
                    tNew += createCards(aSpades2, "s", westVis);
                    tNew += "</div>";
                    tNew += "</div>";

		    if (eastVis == "normal") {
                    tNew += "<div class='mMainDisplayhande'>";
                    tNew += "<div class='hand' style='font-size: " + fontSize + "px; width: " + aSpades.length + "em'>";
                    tNew += createCards(aSpades, "s", eastVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    }
                }
                tNew += "</div>";

                tNew += "<div class='cards_ew_suit'>";
                if (displayStyle == "Simple") {
                    tNew += "<div class='mMainDisplaySimplehandew'>";
                    tNew += "<div><span style='color:red'>&hearts;</span> ";
                    tNew += createCards(aHearts2, "h", westVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    if (eastVis == "normal") {
                    tNew += "<div class='mMainDisplaySimplehandew'>";
                    tNew += "<div><span style='color:red'>&hearts;</span> ";
                    tNew += createCards(aHearts, "h", eastVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    }
                } else {
                    tNew += "<div class='mMainDisplayhandw'>";
                    tNew += "<div class='hand' style='font-size: " + fontSize + "px; width: 2em'>";
                    tNew += createCards(aHearts2, "h", westVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    if (eastVis == "normal") {
                    tNew += "<div class='mMainDisplayhande'>";
                    tNew += "<div class='hand' style='font-size: " + fontSize + "px; width: " + aHearts.length + "em'>";
                    tNew += createCards(aHearts, "h", eastVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    }
                }
                tNew += "</div>";

                tNew += "<div class='cards_ew_suit'>";
                if (displayStyle == "Simple") {
                    tNew += "<div class='mMainDisplaySimplehandew'>";
                    tNew += "<div><span style='color:red'>&diams;</span> ";
                    tNew += createCards(aDiamonds2, "d", westVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    if (eastVis == "normal") {
                    tNew += "<div class='mMainDisplaySimplehandew'>";
                    tNew += "<div><span style='color:red'>&diams;</span> ";
                    tNew += createCards(aDiamonds, "d", eastVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    }
                } else {
                    tNew += "<div class='mMainDisplayhandw'>";
                    tNew += "<div class='hand' style='font-size: " + fontSize + "px; width: 2em'>";
                    tNew += createCards(aDiamonds2, "d", westVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    if (eastVis == "normal") {
                    tNew += "<div class='mMainDisplayhande'>";
                    tNew += "<div class='hand' style='font-size: " + fontSize + "px; width: " + aDiamonds.length + "em'>";
                    tNew += createCards(aDiamonds, "d", eastVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    }
                }
                tNew += "</div>";

                tNew += "<div class='cards_ew_suit'>";
                if (displayStyle == "Simple") {
                    tNew += "<div class='mMainDisplaySimplehandew'>";
                    tNew += "<div>&clubs; ";
                    tNew += createCards(aClubs2, "c", westVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    if (eastVis == "normal") {
                    tNew += "<div class='mMainDisplaySimplehandew'>";
                    tNew += "<div>&clubs; ";
                    tNew += createCards(aClubs, "c", eastVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    }
                } else {
                    tNew += "<div class='mMainDisplayhandw'>";
                    tNew += "<div class='hand' style='font-size: " + fontSize + "px; width: 2em'>";
                    tNew += createCards(aClubs2, "c", westVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    if (eastVis == "normal") {
                    tNew += "<div class='mMainDisplayhande'>";
                    tNew += "<div class='hand' style='font-size: " + fontSize + "px; width: " + aClubs.length + "em'>";
                    tNew += createCards(aClubs, "c", eastVis);
                    tNew += "</div>";
                    tNew += "</div>";
		    }
                }
                tNew += "</div>";
            } else if (displayStyle != "Simple") {
		tNew += "<div class='ewspace'>&nbsp;</div>";
	    }


            tNew += "</div>"; //mMainDisplayCardsEastWest
            tNew += "</div>"; //mMainDisplayEastWest

            if (Display == 'NS' && displayStyle == "Simple") {
                tNew += "<div>&nbsp;</div>";
            } else if (northVis == "normal" && eastVis == "nocards" && westVis == "nocards" && displayStyle == "Simple"){
		tNew += "<div>&nbsp;</div>";
	    }

            tNew += "<div class='mMainDisplaySouth'>";
            if (displayStyle == "Simple") {
                tNew += "<div style='margin-left: 50px'>";
            } else {
                tNew += "<div class='hand' style='font-size: " + fontSize + "px; width: 13em'>";
            }


            tHand = aHandDisplay[0];
            aHand = tHand.split('.');
            tSpades = aHand[0];
            aSpades = tSpades.split("");
            tHearts = aHand[1];
            aHearts = tHearts.split("");
            tDiamonds = aHand[2];
            aDiamonds = tDiamonds.split("");
            tClubs = aHand[3];
            aClubs = tClubs.split("");
            if (displayStyle == "Simple") {
                tNew += "<div>&spades; " + createCards(aSpades, "s", southVis) + "</div>";
                tNew += "<div><span style='color:red'>&hearts;</span> " + createCards(aHearts, "h", southVis) + "</div>";
                tNew += "<div><span style='color:red'>&diams;</span> " + createCards(aDiamonds, "d", southVis) + "</div>";
                tNew += "<div>&clubs; " + createCards(aClubs, "c", southVis) + "</div>";
            } else {
                tNew += createCards(aSpades, "s", southVis);
                tNew += createCards(aHearts, "h", southVis);
                tNew += createCards(aDiamonds, "d", southVis);
                tNew += createCards(aClubs, "c", southVis);
            }


            tNew += "</div>"; //end hand
            tNew += "</div>"; //end mMainDisplaySouth


        } 


        //mMainDisplayTable  close
        tNew += "</div>";

        tNew += "<div class='mMainDisplayCardsCenter'>";
        var centerCardArr;
        var centerPip;
        var centerSuit;
        if (CenterSouth != null) {
            centerCardArr = CenterSouth.split("");
            centerPip = centerCardArr[0];
            centerSuit = centerCardArr[1];
            tNew += "<div class='CenterSouth' >" + createCards([centerPip], centerSuit.toLowerCase()) + "</div>";
        }
        if (CenterNorth != null) {
            centerCardArr = CenterNorth.split("");
            centerPip = centerCardArr[0];
            centerSuit = centerCardArr[1];
            tNew += "<div class='CenterNorth'>" + createCards([centerPip], centerSuit.toLowerCase()) + "</div>";
        }
        if (CenterEast != null) {
            centerCardArr = CenterEast.split("");
            centerPip = centerCardArr[0];
            centerSuit = centerCardArr[1];
            tNew += "<div class='CenterEast'>" + createCards([centerPip], centerSuit.toLowerCase()) + "</div>";
        }
        if (CenterWest != null) {
            centerCardArr = CenterWest.split("");
            centerPip = centerCardArr[0];
            centerSuit = centerCardArr[1];
            tNew += "<div class='CenterWest'>" + createCards([centerPip], centerSuit.toLowerCase()) + "</div>";
        }
        tNew += "</div>";	


	if (Auction != null) {
            if (mHandDisplay == null) {
                tNew += "<div class='mMainDisplayAuctionNoHand'>";
            } else if (displayStyle == "Simple") {
                tNew += "<div class='mMainDisplayAuctionSimple'>";
            } else {
                tNew += "<div class='mMainDisplayAuction'>";
            }
            tNew += displayAuction(HandNumber);

	    
            tNew += "</div>";
        }

	//mMainDisplayAll  close
        tNew += "</div>";

	if (Play == "none") {
		//
	} else if (Play == "true") {		
            var sh = shortMe(mHandDisplay + ' ' + HandNumber);
	    tNew += "<div class='divplaybutton'><a class='button  button_red' href='/play/?game=hand&val=" + sh + "&' ><i class='icon-play'></i> Play</a></div>";		
	} else if (Play == "false") {
	    tNew += "<div class='divplaybutton'><a class='button  button_red' href='/wp-login.php' ><i class='icon-play'></i> Play</a></div>";
	} else {
	    tNew += Play;	
	}
        

        return tNew;
    }



    var aMainClasses = document.querySelectorAll(".mMainDisplay");
    if (aMainClasses) {
        for (var i = 0; i < aMainClasses.length; i++) {
            //aMainClasses[i].innerHTML = '<span class="hide-me-buddy">' + BridgeFormatter(aMainClasses[i].innerHTML, "Complex") + '</span>';
			aMainClasses[i].innerHTML = BridgeFormatter(aMainClasses[i].innerHTML, "Complex");
        }
    }



    var aMainClasses = document.querySelectorAll(".mMainDisplaySimple");
    if (aMainClasses) {
        for (var i = 0; i < aMainClasses.length; i++) {
            aMainClasses[i].innerHTML = BridgeFormatter(aMainClasses[i].innerHTML, "Simple");
        }
    }
    
    hCreateStyleSheet("http://bridge2go.com/Live/JavaScripts/HandDisplay/style.css?1")
}

window.onload = LoadBridgeFormatter;


