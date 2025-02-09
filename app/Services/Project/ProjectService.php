<?php

namespace App\Services\Project;

use App\Http\Resources\IndexProjectResource;
use App\Models\ProjectModel;
use Exception;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public function index(array $params): array
    {
        $query = ProjectModel::select('*')
            ->when(isset($params['name']), function ($query) use ($params) {
                $name = trim($params['name']);
                $query->where('name', 'like', '%' . $name . '%');
            })
            ->when(isset($params['bedrooms']), function ($query) use ($params) {
                $query->where('bedrooms', $params['bedrooms']);
            })
            ->when(isset($params['bathrooms']), function ($query) use ($params) {
                $query->where('bathrooms', $params['bathrooms']);
            })
            ->when(isset($params['storeys']), function ($query) use ($params) {
                $query->where('storeys', $params['storeys']);
            })
            ->when(isset($params['garages']), function ($query) use ($params) {
                $query->where('garages', $params['garages']);
            })
            ->when(isset($params['price']), function ($query) use ($params) {
                $query->whereBetween('price', [$params['price'][0], $params['price'][1]]);
            });

        $projects = $query->paginate($params['page_limit'], ['*'], 'page', $params['page'] ?? 1);
        if ($params['page'] > $projects->lastPage()) {
            $projects = $query->paginate($params['page_limit'], ['*'], 'page', $projects->lastPage());
        }
        return [
            'projects' => IndexProjectResource::collection($projects->items()),
            'data_default' => [
            ],
            'meta' => [
                'current_page' => $projects->currentPage(),
                'last_page' => $projects->lastPage(),
                'total' => $projects->total(),
            ],
        ];
    }
    public function update(array $data): array
    {
        $result = [
            'successes' => [],
            'errors' => []
        ];
        foreach ($data as $project) {
            try {
                DB::beginTransaction();
                $project = ProjectModel::updateOrCreate([
                    'name' => $project['Name'],
                ], [
                    'price' => $project['Price'],
                    'bedrooms' => $project['Bedrooms'],
                    'bathrooms' => $project['Bathrooms'],
                    'storeys' => $project['Storeys'],
                    'garages' => $project['Garages'],
                ]);
                DB::commit();
                $action = $project->wasRecentlyCreated ? 'created' : 'updated';
                $result['successes'][] = $project->name . ' ' . $action;
            } catch (Exception $exception) {
                DB::rollBack();
                $result['errors'][] = $project['Name'].' with error - '.$exception->getMessage();
            }
        }
        return $result;
    }
}
