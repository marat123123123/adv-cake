<?php

//Запускаем тесты

class TestReverseWordsLetters {
    public function testCat() {
        assert(reverseWordsLetters('Cat') === 'Tac');
    }

    public function testMysh() {
        assert(reverseWordsLetters('Мышь') === 'Ьшым');
    }

    public function testHouse() {
        assert(reverseWordsLetters('houSe') === 'esuOh');
    }

    public function testDomik() {
        assert(reverseWordsLetters('домИК') === 'кимОД');
    }

    public function testElephant() {
        assert(reverseWordsLetters('elEpHant') === 'tnAhPele');
    }

    public function testCatComma() {
        assert(reverseWordsLetters('cat,') === 'tac,');
    }

    public function testZimaColon() {
        assert(reverseWordsLetters('Зима:') === 'Амиз:');
    }

    public function testQuotes() {
        assert(reverseWordsLetters("is 'cold' now") === "si 'dloc' won");
    }

    public function testRussianMixed() {
        assert(reverseWordsLetters('это «Так» "просто"') === 'отэ «Кат» "отсорп"');
    }

    public function testHyphen() {
        assert(reverseWordsLetters('third-part') === 'driht-trap');
    }

    public function testApostrophe() {
        assert(reverseWordsLetters('can`t') === 'nac`t');
    }

    public static function runTests() {
        $tests = [
            'testCat', 'testMysh', 'testHouse', 'testDomik', 'testElephant',
            'testCatComma', 'testZimaColon', 'testQuotes', 'testRussianMixed',
            'testHyphen', 'testApostrophe'
        ];
        foreach ($tests as $test) {
            try {
                (new self())->{$test}();
                echo "✓ " . $test . "\n";
            } catch (AssertionError $e) {
                echo "✗ " . $test . ": " . $e->getMessage() . "\n";
            }
        }
    }
}

TestReverseWordsLetters::runTests();