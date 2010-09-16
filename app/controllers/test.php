<?php
class ColnectTestStrings {
	public static function a($text) {
		$reversedText = "";

		for ($i = strlen($text) - 1; $i > 0; $i--) {
			$reversedText .= $text[$i];
		}

		return $reversedText;
	}

	public static function b($text, $number) {
		if ($text == "" || $number > 5 || $number < 0) {
		  return false;
		}

		$text1 = $text;
		$returnText = "";
		//$numbers = array();
        $textArray = split(" ", $text);

        for ($i = 0; $i < $textArray; $i++) {
          if ($textArray[$i]*1 > 0 || $textArray[$i] == "0") {
            $replacedNumber = ($textArray[$i]*1 + $number).$number;
            $returnText .= str_replace($textArray[$i]*1, $replacedNumber, $textArray[$i])." ";
          } else {
            $returnText .= $textArray[$i]." ";
          }
        }

		return substr($returnText, 0, strlen($returnText) - 1);
	}

	public static function c($text) {
		$printText = "";

		for ($i = 0; $i < strlen($text); $i++) {
		  if ($i % 2 == 0) {
				$printText .= $text[$i];
			}
		}

		return $printText;
	}

	public static function d($text) {
	  $output = "";
		$line = 1;

		for ($i = 0; $i < strlen($text); $i++) {
			$output .= "$line: ".substr($text, 0, $i)."\n";
			$line++;
		}

		for ($i = strlen($text) - 2; $i > 0; $i--) {
			$output .= "$line: ".substr($text, 0, $i)."\n";
		}

		print_r($output);

		return $output;
	}
}

function testAShouldSuccess() {
  $text = "Colnect";
	$reversedText = ColnectTestStrings::a($text);

	if ($reversedText == "tcenloC") {
		print_r("Successfull\n");
	} else {
		print_r("Failed, the result should be tcenloC\n");
	}
}

function testBShouldFail() {
  $text = "Today is 5th August, 2010";
	$returnText = ColnectTestStrings::b($text, rand(100) + 6);

	if ($returnText !== false) {
		echo "Failed: should return false\n";

		return;
	}

	$text = "Today is 5th August, 2010";
	$returnText = ColnectTestStrings::b($text, -1*rand(100)* -1);

	if ($returnText !== false) {
		echo "Failed: should return false\n";

		return;
	}

	$text = "";
	$returnText = ColnectTestStrings::b($text, 7);

	if ($returnText !== false) {
		echo "Failed: should return false\n";

		return;
	}

	echo "Successful";
}

function testBShouldSuccess() {
    $text = "Today is 4th August, 2010";
	$number = rand(5);
	$returnText = ColnectTestStrings::b($text, $number);

	if ($returnText != "Today is ".(4 + $number).$number."th August, ".$number.$number) {
		echo "Failed: Expected: "."Today is ".(4 + $number).$number."th August, ".$number.$number;
	}

	$text = "Today is 9th August, 2016";
	$number = rand(5);
	$returnText = ColnectTestStrings::b($text, $number);

	if ($returnText != "Today is ".(((9 + $number) % 10).$number)."th August, ".((6 + $number) % 10).$number) {
		echo "Failed: should be: "."Today is ".(((9 + $number) % 10).$number)."th August, ".((6 + $number) % 10).$number;
    }

	//echo "Successful";
}

function testCShouldSuccess() {
	$text = "1234567";
	$printText = ColnectTestStrings::c($text);

	if ($printText != "1357") {
		echo "Filed: expect: 1357";

		return;
	}

	$text = "12345678";
	$printText = ColnectTestStrings::c($text);

	if ($printText != "1357") {
		echo "Filed: expect: 1357";

		return;
	}

	echo "Successful";
}

function testDShouldSuccess() {
	$text = "colnect";
	$returnText = ColnectTestStrings::d($text);

	if ($returnText != "1: c\n2: co\n3: col\n4: coln\n5: colne\n6: colnec\n7: colnect\n8: colnec\n9: colne\n10: coln\n11: col\n12: co\n13: c") {
		echo "Failed, expected: "."1: c\n2: co\n3: col\n4: coln\n5: colne\n6: colnec\n7: colnect\n8: colnec\n9: colne\n10: coln\n11: col\n12: co\n13: c";
	}

	echo "Successul";
}

echo "Test function a: \n";
testAShouldSuccess();

echo "Test function b: \n";
testBShouldRFail();
testBShouldSuccess();

echo "Test function b: \n";
testCShouldSuccess();

echo "Test function b: \n";
testDShouldSuccess();