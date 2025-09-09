<?php

namespace App\Controllers\IT;

use App\Controllers\BaseController;

class SystemLogs extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'System Logs',
            'log_stats' => [
                'total_logs' => ['value' => '12,847', 'icon' => '📋', 'color' => 'blue'],
                'error_logs' => ['value' => '234', 'icon' => '❌', 'color' => 'red'],
                'warning_logs' => ['value' => '1,456', 'icon' => '⚠️', 'color' => 'orange'],
                'info_logs' => ['value' => '11,157', 'icon' => 'ℹ️', 'color' => 'green'],
            ],
            'recent_logs' => [
                [
                    'timestamp' => '2024-01-15 14:30:25',
                    'level' => 'ERROR',
                    'message' => 'Database connection failed for user authentication',
                    'source' => 'AuthController',
                    'user_id' => 'user_123',
                    'ip_address' => '192.168.1.100',
                    'level_class' => 'error'
                ],
                [
                    'timestamp' => '2024-01-15 14:28:12',
                    'level' => 'WARNING',
                    'message' => 'High memory usage detected on server-02',
                    'source' => 'SystemMonitor',
                    'user_id' => 'system',
                    'ip_address' => '127.0.0.1',
                    'level_class' => 'warning'
                ],
                [
                    'timestamp' => '2024-01-15 14:25:45',
                    'level' => 'INFO',
                    'message' => 'User login successful',
                    'source' => 'AuthController',
                    'user_id' => 'admin_001',
                    'ip_address' => '192.168.1.50',
                    'level_class' => 'info'
                ],
                [
                    'timestamp' => '2024-01-15 14:22:18',
                    'level' => 'ERROR',
                    'message' => 'Failed to backup database - insufficient disk space',
                    'source' => 'BackupService',
                    'user_id' => 'system',
                    'ip_address' => '127.0.0.1',
                    'level_class' => 'error'
                ],
                [
                    'timestamp' => '2024-01-15 14:20:33',
                    'level' => 'INFO',
                    'message' => 'System maintenance completed successfully',
                    'source' => 'MaintenanceService',
                    'user_id' => 'system',
                    'ip_address' => '127.0.0.1',
                    'level_class' => 'info'
                ],
                [
                    'timestamp' => '2024-01-15 14:18:07',
                    'level' => 'WARNING',
                    'message' => 'Unusual login pattern detected from IP 203.45.67.89',
                    'source' => 'SecurityMonitor',
                    'user_id' => 'user_456',
                    'ip_address' => '203.45.67.89',
                    'level_class' => 'warning'
                ],
                [
                    'timestamp' => '2024-01-15 14:15:52',
                    'level' => 'INFO',
                    'message' => 'New user registered successfully',
                    'source' => 'UserController',
                    'user_id' => 'user_789',
                    'ip_address' => '192.168.1.75',
                    'level_class' => 'info'
                ],
                [
                    'timestamp' => '2024-01-15 14:12:41',
                    'level' => 'ERROR',
                    'message' => 'Payment processing failed - invalid card details',
                    'source' => 'PaymentService',
                    'user_id' => 'user_321',
                    'ip_address' => '192.168.1.90',
                    'level_class' => 'error'
                ],
                [
                    'timestamp' => '2024-01-15 14:10:28',
                    'level' => 'INFO',
                    'message' => 'Email notification sent successfully',
                    'source' => 'EmailService',
                    'user_id' => 'system',
                    'ip_address' => '127.0.0.1',
                    'level_class' => 'info'
                ],
                [
                    'timestamp' => '2024-01-15 14:08:15',
                    'level' => 'WARNING',
                    'message' => 'API rate limit exceeded for client app_001',
                    'source' => 'APIGateway',
                    'user_id' => 'app_001',
                    'ip_address' => '10.0.0.15',
                    'level_class' => 'warning'
                ]
            ],
            'log_filters' => [
                'levels' => ['All Levels', 'ERROR', 'WARNING', 'INFO', 'DEBUG'],
                'sources' => ['All Sources', 'AuthController', 'SystemMonitor', 'BackupService', 'SecurityMonitor', 'UserController', 'PaymentService', 'EmailService', 'APIGateway', 'MaintenanceService'],
                'time_ranges' => ['Last Hour', 'Last 24 Hours', 'Last 7 Days', 'Last 30 Days', 'Custom Range']
            ]
        ];

        return view('it/system-logs', $data);
    }
}
