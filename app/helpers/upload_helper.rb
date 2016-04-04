module UploadHelper

  def generate_hash
    chars   = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!'
    hash    = ''
    count   = 0

    while count < 5 do
      hash = hash + chars[Random.rand(chars.length-1)]
      count = count + 1
    end

    return hash
  end

end
