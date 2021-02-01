<?php

namespace App\Services\Admin\Simulator;

use App\Repositories\Admin\Simulator\AdminSimulatorRepository;
use Illuminate\Database\Eloquent\Model;

class AdminSimulatorService
{
    /**
     * @var AdminSimulatorRepository
     */
    private AdminSimulatorRepository $adminSimulatorRepository;

    /**
     * QuizService constructor.
     * @param AdminSimulatorRepository $adminSimulatorRepository
     */
    public function __construct(AdminSimulatorRepository $adminSimulatorRepository)
    {
        $this->adminSimulatorRepository = $adminSimulatorRepository;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->adminSimulatorRepository
            ->create($data['body']);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function update(array $data, int $id): bool
    {
        return $this->adminSimulatorRepository
            ->update($data['body'], $id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->adminSimulatorRepository
            ->delete($id);
    }

    /**
     * @param int $simulatorId
     * @return Model|null
     */
    public function getSimulatorById(int $simulatorId): ?Model
    {
        return $this->adminSimulatorRepository
            ->findOneById($simulatorId);
    }

    /**
     * @param array $queryOptions
     * @return array
     */
    public function getSimulators(array $queryOptions): array
    {
        $queryOptions['table'] = $this->adminSimulatorRepository
            ->getTableName();

        return $this->adminSimulatorRepository
            ->get($queryOptions);
    }
}
