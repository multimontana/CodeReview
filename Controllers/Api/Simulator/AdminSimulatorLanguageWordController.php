<?php

namespace App\Http\Controllers\Api\Admin\Simulator;

use App\Http\Controllers\Controller;
use App\Requests\Admin\Simulator\AdminCreateSimulatorLanguageWordRequest;
use App\Services\Admin\Simulator\AdminSimulatorLanguageWordService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminSimulatorLanguageWordController extends Controller
{
    /**
     * @var AdminSimulatorLanguageWordService
     */
    private AdminSimulatorLanguageWordService $adminSimulatorLanguageWordService;

    /**
     * QuizController constructor.
     * @param AdminSimulatorLanguageWordService $adminSimulatorLanguageWordService
     */
    public function __construct(AdminSimulatorLanguageWordService $adminSimulatorLanguageWordService)
    {
        $this->adminSimulatorLanguageWordService = $adminSimulatorLanguageWordService;
    }

    /**
     * @param AdminCreateSimulatorLanguageWordRequest $request
     * @return JsonResponse
     */
    public function createAction(AdminCreateSimulatorLanguageWordRequest $request): JsonResponse
    {
        $requestData = $this->setRequest($request);

        $data = $this->adminSimulatorLanguageWordService
            ->create($requestData);

        return response()
            ->json(['data' => $data], JsonResponse::HTTP_CREATED);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateAction(Request $request, int $id): JsonResponse
    {
        $requestData = $this->setRequestBody($request);

        $data = $this->adminSimulatorLanguageWordService
            ->update($requestData, $id);

        return response()
            ->json(['data' => $data], JsonResponse::HTTP_OK);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function deleteAction(Request $request, int $id): JsonResponse
    {
        $data = $this->adminSimulatorLanguageWordService
            ->delete($id);

        return response()
            ->json(['data' => $data], JsonResponse::HTTP_OK);
    }

    /**
     * @param int $simulatorId
     * @return JsonResponse
     */
    public function getSimulatorLanguageWordByIdAction(int $simulatorId): JsonResponse
    {
        $data = $this->adminSimulatorLanguageWordService
            ->getSimulatorLanguageWordById($simulatorId);

        return response()
            ->json(['data' => $data], JsonResponse::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getSimulatorsLanguageWordsAction(Request $request): JsonResponse
    {
        $queryOptions = $this->setQueries($request->query());

        $data = $this->adminSimulatorLanguageWordService
            ->getSimulatorLanguageWords($queryOptions);

        return response()
            ->json(['data' => $data], JsonResponse::HTTP_OK);
    }
}
