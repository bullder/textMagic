<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use App\Entity\Question;
use App\Entity\Test;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->persist(
            (new Test(
                title: 'Test 1',
                text: 'test description'
            ))->addQuestion(
                (new Question(
                    text: '2 + 2 ='
                ))->addAnswer(
                    new Answer('4', true)
                )->addAnswer(
                    new Answer('3', false)
                )->addAnswer(
                    new Answer('1 + 3', true)
                )
            )->addQuestion(
                (new Question(
                    text: '2 + 3 ='
                ))->addAnswer(
                    new Answer('5', true)
                )->addAnswer(
                    new Answer('8', false)
                )->addAnswer(
                    new Answer('0', false)
                )
            )
        );

        $manager->persist(
            (new Test(
                title: 'Math Test',
                text: 'Solve the following equations'
            ))->addQuestion(
                (new Question(
                    text: '2 + 2 ='
                ))->addAnswer(
                    new Answer('4', true)
                )->addAnswer(
                    new Answer('3', false)
                )->addAnswer(
                    new Answer('1 + 3', true)
                )
            )->addQuestion(
                (new Question(
                    text: '2 + 3 ='
                ))->addAnswer(
                    new Answer('5', true)
                )->addAnswer(
                    new Answer('8', false)
                )->addAnswer(
                    new Answer('0', false)
                )
            )->addQuestion(
                (new Question(
                    text: '1 + 1 ='
                ))->addAnswer(
                    new Answer('3', false)
                )->addAnswer(
                    new Answer('2', true)
                )->addAnswer(
                    new Answer('0', false)
                )
            )->addQuestion(
                (new Question(
                    text: '2 + 2 ='
                ))->addAnswer(
                    new Answer('4', true)
                )->addAnswer(
                    new Answer('3 + 1', true)
                )->addAnswer(
                    new Answer('10', false)
                )
            )->addQuestion(
                (new Question(
                    text: '3 + 3 ='
                ))->addAnswer(
                    new Answer('1 + 5', true)
                )->addAnswer(
                    new Answer('1', false)
                )->addAnswer(
                    new Answer('6', true)
                )->addAnswer(
                    new Answer('2 + 4', true)
                )
            )->addQuestion(
                (new Question(
                    text: '4 + 4 ='
                ))->addAnswer(
                    new Answer('8', true)
                )->addAnswer(
                    new Answer('4', false)
                )->addAnswer(
                    new Answer('0', false)
                )->addAnswer(
                    new Answer('0 + 8', true)
                )
            )->addQuestion(
                (new Question(
                    text: '5 + 5 ='
                ))->addAnswer(
                    new Answer('6', false)
                )->addAnswer(
                    new Answer('18', false)
                )->addAnswer(
                    new Answer('10', true)
                )->addAnswer(
                    new Answer('9', false)
                )->addAnswer(
                    new Answer('0', false)
                )
            )->addQuestion(
                (new Question(
                    text: '6 + 6 ='
                ))->addAnswer(
                    new Answer('3', false)
                )->addAnswer(
                    new Answer('9', false)
                )->addAnswer(
                    new Answer('0', false)
                )->addAnswer(
                    new Answer('12', true)
                )->addAnswer(
                    new Answer('5 + 7', true)
                )
            )->addQuestion(
                (new Question(
                    text: '7 + 7 ='
                ))->addAnswer(
                    new Answer('5', false)
                )->addAnswer(
                    new Answer('14', true)
                )
            )->addQuestion(
                (new Question(
                    text: '8 + 8 ='
                ))->addAnswer(
                    new Answer('16', true)
                )->addAnswer(
                    new Answer('12', false)
                )->addAnswer(
                    new Answer('9', false)
                )->addAnswer(
                    new Answer('5', false)
                )
            )->addQuestion(
                (new Question(
                    text: '9 + 9 ='
                ))->addAnswer(
                    new Answer('18', true)
                )->addAnswer(
                    new Answer('9', false)
                )->addAnswer(
                    new Answer('17 + 1', true)
                )->addAnswer(
                    new Answer('2 + 16', true)
                )
            )->addQuestion(
                (new Question(
                    text: '10 + 10 ='
                ))->addAnswer(
                    new Answer('0', false)
                )->addAnswer(
                    new Answer('2', false)
                )->addAnswer(
                    new Answer('8', false)
                )->addAnswer(
                    new Answer('20', true)
                )
            )
        );


        $manager->flush();
    }
}
