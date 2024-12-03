<?php
function getProjectStats($db)
{
    try {
        $stats = [
            'total' => 0,
            'completed' => 0,
            'in_progress' => 0,
            'delayed' => 0,
            'researchers' => 0,
            'total_budget' => 0,
            'avg_completion' => 0,
            'recent_activities' => []
        ];

        // Obtener estadísticas básicas
        $query = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN status = 'Completado' THEN 1 ELSE 0 END) as completed,
                    SUM(CASE WHEN status = 'En Progreso' THEN 1 ELSE 0 END) as in_progress,
                    SUM(CASE WHEN status = 'Retrasado' THEN 1 ELSE 0 END) as delayed,
                    SUM(researchers) as total_researchers,
                    SUM(budget) as total_budget,
                    AVG(completion) as avg_completion
                FROM projects";

        $stmt = $db->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $stats = array_merge($stats, $result);

        // Obtener actividades recientes
        $query = "SELECT name, status, completion, created_at 
                FROM projects 
                ORDER BY created_at DESC 
                LIMIT 5";

        $stmt = $db->query($query);
        $stats['recent_activities'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Calcular tendencias
        $query = "SELECT AVG(completion) as avg_completion,
                        DATE_FORMAT(created_at, '%Y-%m') as month
                FROM projects 
                GROUP BY DATE_FORMAT(created_at, '%Y-%m')
                ORDER BY month DESC 
                LIMIT 6";

        $stmt = $db->query($query);
        $stats['completion_trend'] = array_reverse($stmt->fetchAll(PDO::FETCH_ASSOC));

        return $stats;
    } catch (PDOException $e) {
        error_log("Error en getProjectStats: " . $e->getMessage());
        return false;
    }
}

function getProjectDetails($db)
{
    try {
        $query = "SELECT p.*,
                    (SELECT COUNT(*) FROM project_updates WHERE project_id = p.id) as updates_count
                FROM projects p
                ORDER BY p.created_at DESC";

        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en getProjectDetails: " . $e->getMessage());
        return false;
    }
}

function formatNumber($number)
{
    if ($number >= 1000000) {
        return round($number / 1000000, 1) . 'M';
    } elseif ($number >= 1000) {
        return round($number / 1000, 1) . 'K';
    }
    return $number;
}

function getStatusClass($status)
{
    switch ($status) {
        case 'En Progreso':
            return 'status-en-progreso';
        case 'Retrasado':
            return 'status-retrasado';
        case 'Completado':
            return 'status-completado';
        default:
            return 'status-default';
    }
}

function calculateProjectHealth($completion, $status)
{
    if ($status == 'Retrasado') {
        return 'danger';
    } elseif ($completion >= 90) {
        return 'success';
    } elseif ($completion >= 60) {
        return 'info';
    } else {
        return 'warning';
    }
}

function getRecentActivities($db, $limit = 5)
{
    try {
        $query = "SELECT p.name, pu.update_text, pu.created_at
                FROM project_updates pu
                JOIN projects p ON p.id = pu.project_id
                ORDER BY pu.created_at DESC
                LIMIT ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en getRecentActivities: " . $e->getMessage());
        return false;
    }
}
