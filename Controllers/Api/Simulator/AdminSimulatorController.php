<?php

namespace App\Http\Controllers\Api\Admin\Simulator;

use App\Http\Controllers\Controller;
use App\Requests\Admin\Simulator\AdminCreateSimulatorRequest;
use App\Services\Admin\Simulator\AdminSimulatorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminSimulatorController extends Controller
{
    /**
     * @var AdminSimulatorService
     */
    private AdminSimulatorService $adminSimulatorService;

    /**
     * QuizController constructor.
     * @param AdminSimulatorService $adminSimulatorService
     */
    public function __construct(AdminSimulatorService $adminSimulatorService)
    {
        $this->adminSimulatorService = $adminSimulatorService;
    }

    /**
     * @param AdminCreateSimulatorRequest $request
     * @return JsonResponse
     */
    public function createAction(AdminCreateSimulatorRequest $request): JsonResponse
    {
        $requestData = $this->setRequestBody($request);

        $data = $this->adminSimulatorService
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

        $data = $this->adminSimulatorService
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
        $data = $this->adminSimulatorService
            ->delete($id);

        return response()
            ->json(['data' => $data], JsonResponse::HTTP_OK);
    }

    /**
     * @param int $simulatorId
     * @return JsonResponse
     */
    public function getSimulatorByIdAction(int $simulatorId): JsonResponse
    {
        $data = $this->adminSimulatorService
            ->getSimulatorById($simulatorId);

        return response()
            ->json(['data' => $data], JsonResponse::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getSimulatorsAction(Request $request): JsonResponse
    {
        $queryOptions = $this->setQueries($request->query());

        $data = $this->adminSimulatorService
            ->getSimulators($queryOptions);

        return response()
            ->json(['data' => $data], JsonResponse::HTTP_OK);
    }
}
