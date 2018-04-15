<?php
namespace App\Controller;
use App\Filter\FilterFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FilterAction
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Route("/filter")
     * @Method({"POST"})
     */
    public function __invoke(Request $request)
    {
        try {
            $job = json_decode($request->getContent());
            $string = $job->text;
            foreach ($job->methods as $method) {
                $filter = FilterFactory::createFilter($method);
                $string = $filter->filter($string);
            }

            return new JsonResponse(["text" => $string]);
        } catch (\Exception $e) {
            return new JsonResponse(null, 500);
        }

    }
}