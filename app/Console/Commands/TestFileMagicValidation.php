<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\FileMagicValidator;

class TestFileMagicValidation extends Command
{
    protected $signature = 'test:file-magic-validation';
    protected $description = 'Test file magic number validation';

    public function handle()
    {
        $this->info('Testing File Magic Number Validation...');

        // Test cases
        $testCases = [
            [
                'description' => 'Valid PDF file',
                'content' => hex2bin('255044462D312E34'), // %PDF-1.4
                'extension' => 'pdf',
                'expected' => true
            ],
            [
                'description' => 'PHP file disguised as PDF',
                'content' => '<?php echo "malicious code"; ?>',
                'extension' => 'pdf',
                'expected' => false
            ],
            [
                'description' => 'Valid JPEG file',
                'content' => hex2bin('FFD8FFE000104A4649460001'), // JPEG header
                'extension' => 'jpg',
                'expected' => true
            ],
            [
                'description' => 'Executable disguised as image',
                'content' => hex2bin('4D5A90000300000004000000'), // MZ (executable)
                'extension' => 'png',
                'expected' => false
            ],
            [
                'description' => 'Valid ZIP file',
                'content' => hex2bin('504B0304140000000800'), // ZIP header
                'extension' => 'zip',
                'expected' => true
            ],
            [
                'description' => 'HTML disguised as ZIP',
                'content' => '<html><script>alert("xss")</script></html>',
                'extension' => 'zip',
                'expected' => false
            ]
        ];

        foreach ($testCases as $test) {
            $this->line("Testing: {$test['description']}");

            // Create temporary file
            $tempFile = tmpfile();
            fwrite($tempFile, $test['content']);
            $tempPath = stream_get_meta_data($tempFile)['uri'];

            // Create UploadedFile mock
            $uploadedFile = new \Illuminate\Http\UploadedFile(
                $tempPath,
                'test.' . $test['extension'],
                'application/octet-stream',
                null,
                true
            );

            $result = FileMagicValidator::validateFileType($uploadedFile, $test['extension']);

            if ($result === $test['expected']) {
                $this->info("✓ PASS - Expected: " . ($test['expected'] ? 'true' : 'false') . ", Got: " . ($result ? 'true' : 'false'));
            } else {
                $this->error("✗ FAIL - Expected: " . ($test['expected'] ? 'true' : 'false') . ", Got: " . ($result ? 'true' : 'false'));
            }

            fclose($tempFile);
            $this->line('');
        }

        $this->info('File Magic Validation Test Complete!');
    }
}
