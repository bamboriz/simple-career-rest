<?php
namespace App\Controller;

use App\Entity\Question;
use App\Entity\QuestionIndustry;
use App\Repository\QuestionRepository;
use App\Repository\QuestionIndustryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class QuestionController extends ApiController
{
    /**
    * @Route("/questions", methods="GET")
    */
    public function index(QuestionRepository $questionRepository)
    {
        $questions = $questionRepository->transformAll();

        return $this->respond($questions);
    }

    
    /**
    * @Route("/questions", methods="POST")
    */
    public function newQuestion(Request $request, EntityManagerInterface $em, QuestionRepository $questionRepository)
    {
        if (! $request) {
            return $this->respondValidationError('Please provide a valid request!');
        }

        // validate the question
        if (! $request->get('question')) {
            return $this->respondValidationError('Please ask a question!');
        }

        //Save Question to DB
        $question = new Question;
        $question->setQuestion($request->get('question'));
        $question->setAuthorId($request->get('userId'));
        $question->setAuthorName($request->get('userName'));
        $question->setDateCreated(new \DateTime());

        $em->persist($question);
        $em->flush();
        $questionId = $question->getId();
     
        $taggedIndustries = $request->get('industries');

        //Saving Industries tagged to Question
        foreach ($taggedIndustries as $value) {
            
            $questionIndustry = new QuestionIndustry;
            $questionIndustry->setQuestionId($questionId);
            $questionIndustry->setIndustryId($value['id']);
            $questionIndustry->setIndustryName($value['name']);
            $em->persist($questionIndustry);
            $em->flush();
            
        }

        $response = [
            "message" => "Question created successfully !",
            "data" => $questionRepository->transform($question)
        ];

        return $this->respondCreated($response);
        
    }

}
