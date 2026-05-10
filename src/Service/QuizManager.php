<?php

namespace App\Service;

use App\Entity\Quiz;

class QuizManager
{
    public function validate(Quiz $quiz): bool
    {
        if (empty($quiz->getTitre())) {
            throw new \InvalidArgumentException('Le titre est obligatoire');
        }

        if (empty($quiz->getReponseCorrect())) {
            throw new \InvalidArgumentException('La réponse correcte est obligatoire');
        }

        if ($quiz->getScoreQuiz() !== null && $quiz->getScoreQuiz() <= 0) {
            throw new \InvalidArgumentException('Le score doit être positif');
        }

        return true;
    }
}