<?php

namespace Lacodix\SevdeskSaloon\Requests\Voucher;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * voucherUploadFile
 *
 * To attach a document to a voucher, you will need to upload it first for later use.<br> To do this,
 * you can use this request.<br> When you successfully uploaded the file, you will get a sevdesk
 * internal filename in the response.<br> The filename will be a hash generated from your uploaded
 * file. You will need it in the next request!<br> After you got the just mentioned filename, you can
 * enter it as a value for the filename parameter of the saveVoucher request.<br> If you provided all
 * necessary parameters and kept all of them in the right order, the file will be attached to your
 * voucher.
 */
class VoucherUploadFile extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $file,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/Voucher/Factory/uploadTempFile';
    }

    protected function defaultBody(): array
    {
        return [
            new MultipartValue(name: 'file', value: $this->file),
        ];
    }
}
