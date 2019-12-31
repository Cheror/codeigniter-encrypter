# codeigniter-encode-library
Working string encoding library for codeigniter. Pure PHP code.
This enables you to encrypt and decrypt strings,encode and decode (base64encode).
Installation
use composer to install or download and place the extrated directry application/libraries/....
Autoload the library.

generate a unique key and edit secret_key="your-unique-key-maybe-md5";
Encrypt string: $this->encrypter->encrypt_decryt('encrypt',$string-to-encrypt);
Decrypt String: $this->encrypter->encrypt_decryt('decrypt',$encodedstring);
Encode: $this->encrypter->encode($strin-to-encrypt);
Encode: $this->encrypter->decode($encodedstring);

If any problem contact hoseahkplgt@outlook.com

That simple.Enjoy coding.
