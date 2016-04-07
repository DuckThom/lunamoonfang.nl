class Image < ActiveRecord::Base
  attr_accessor :upload

  def self.save_file(upload, hash)
    begin
      !upload['file'].nil?
      file_name = upload['file'].original_filename if (upload['file'] != '')
      file_data = upload['file'].read
      file_type = upload['file'].content_type

    rescue NoMethodError
      file_name = upload.original_filename if (upload != '')
      file_data = upload.read
      file_type = 'image/png' # screenshot is always image/png
    end

    self.create(name: file_name, url_hash: hash, image_type: file_type, image_data: file_data)
  end
end
